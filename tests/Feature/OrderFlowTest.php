<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Program;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_cart_page_can_be_rendered_when_empty(): void
    {
        $response = $this->get(route('cart.index'));

        $response->assertStatus(200);
        $response->assertSee('Keranjang Belanja');
        $response->assertSee('Keranjang Anda Kosong');
    }

    public function test_program_can_be_added_to_cart(): void
    {
        $program = Program::create([
            'title' => 'Roadshow Sekolah: Energi Kinetik',
            'slug' => 'roadshow-sekolah-energi-kinetik',
            'category' => 'Fisika',
            'description' => 'Eksperimen fisika energi kinetik untuk anak.',
            'price' => 55000,
            'target_age' => 'SD/MI',
            'is_active' => true,
        ]);

        $response = $this->post(route('cart.add'), [
            'program_id' => $program->id,
            'quantity' => 1,
        ]);

        $response->assertRedirect(route('cart.index'));
        $this->assertTrue(session()->has('cart'));
        $this->assertArrayHasKey((string) $program->id, session('cart'));
        $this->assertEquals(1, session('cart')[(string) $program->id]['quantity']);
    }

    public function test_cart_item_quantity_can_be_updated_and_removed(): void
    {
        $program = Program::create([
            'title' => 'Jelajah Tata Surya',
            'slug' => 'jelajah-tata-surya',
            'category' => 'Astronomi',
            'description' => 'Belajar astronomi.',
            'price' => 30000,
            'is_active' => true,
        ]);

        $cart = [
            (string) $program->id => [
                'id' => $program->id,
                'program_id' => $program->id,
                'title' => $program->title,
                'category' => $program->category,
                'image' => null,
                'subtitle' => 'Target: SD/MI',
                'price' => 30000,
                'quantity' => 1,
            ],
        ];

        // Increase quantity
        $response = $this->withSession(['cart' => $cart])
            ->post(route('cart.update', $program->id), ['action' => 'increase']);

        $response->assertRedirect(route('cart.index'));
        $this->assertEquals(2, session('cart')[(string) $program->id]['quantity']);

        // Remove item
        $response = $this->withSession(['cart' => $cart])
            ->delete(route('cart.remove', $program->id));

        $response->assertRedirect(route('cart.index'));
        $this->assertArrayNotHasKey((string) $program->id, session('cart', []));
    }

    public function test_checkout_redirects_if_cart_is_empty(): void
    {
        $response = $this->get(route('checkout.index'));

        $response->assertRedirect(route('cart.index'));
    }

    public function test_checkout_page_renders_with_cart_items(): void
    {
        $cart = [
            '1' => [
                'id' => 1,
                'program_id' => 1,
                'title' => 'Roadshow Sekolah: Energi Kinetik',
                'category' => 'Fisika',
                'image' => null,
                'subtitle' => 'Target: SD/MI',
                'price' => 55000,
                'quantity' => 1,
            ],
        ];

        $response = $this->withSession(['cart' => $cart])
            ->get(route('checkout.index'));

        $response->assertStatus(200);
        $response->assertSee('Checkout');
        $response->assertSee('Detail Pemesan');
        $response->assertSee('Roadshow Sekolah: Energi Kinetik');
        $response->assertSee('55.000');
    }

    public function test_order_can_be_placed_successfully_and_saves_to_database(): void
    {
        $program1 = Program::create([
            'title' => 'Roadshow Sekolah: Energi Kinetik',
            'slug' => 'roadshow-sekolah-energi-kinetik',
            'category' => 'Fisika',
            'price' => 55000,
            'is_active' => true,
        ]);

        $program2 = Program::create([
            'title' => 'Jelajah Tata Surya',
            'slug' => 'jelajah-tata-surya',
            'category' => 'Astronomi',
            'price' => 30000,
            'is_active' => true,
        ]);

        $cart = [
            (string) $program1->id => [
                'id' => $program1->id,
                'program_id' => $program1->id,
                'title' => $program1->title,
                'category' => $program1->category,
                'image' => null,
                'subtitle' => 'Target: SD/MI',
                'price' => 55000,
                'quantity' => 1,
            ],
            (string) $program2->id => [
                'id' => $program2->id,
                'program_id' => $program2->id,
                'title' => $program2->title,
                'category' => $program2->category,
                'image' => null,
                'subtitle' => 'Target: SD/MI',
                'price' => 30000,
                'quantity' => 1,
            ],
        ];

        $response = $this->withSession(['cart' => $cart])
            ->post(route('checkout.store'), [
                'customer_name' => 'Bapak Budi Santoso',
                'customer_phone' => '081234567890',
                'customer_email' => 'budi.santoso@email.com',
                'notes' => 'Tolong sesi pagi hari jam 09.00 WIB.',
            ]);

        $this->assertDatabaseHas('orders', [
            'customer_name' => 'Bapak Budi Santoso',
            'customer_phone' => '081234567890',
            'customer_email' => 'budi.santoso@email.com',
            'subtotal' => 85000,
            'total_amount' => 85000,
            'status' => 'menunggu_pembayaran',
        ]);

        $order = Order::first();
        $this->assertNotNull($order);
        $this->assertCount(2, $order->items);

        $response->assertRedirect(route('invoice.show', $order->id));
        $this->assertFalse(session()->has('cart'));
    }

    public function test_invoice_page_renders_order_details_correctly(): void
    {
        $order = Order::create([
            'order_number' => 'INV-AMMA-2024001',
            'customer_name' => 'Bapak Budi Santoso',
            'customer_phone' => '+62 812 3456 7890',
            'customer_email' => 'budi.santoso@email.com',
            'notes' => 'Catatan khusus',
            'subtotal' => 85000,
            'service_fee' => 2500,
            'total_amount' => 87500,
            'status' => 'menunggu_pembayaran',
            'payment_due_date' => now()->addDays(3),
        ]);

        $order->items()->create([
            'item_name' => 'Roadshow Sekolah: Energi Kinetik',
            'item_category' => 'Fisika',
            'item_subtitle' => 'Sesi: 28 Oktober 2024 | Peserta: Andi (8 Tahun)',
            'price' => 55000,
            'quantity' => 1,
            'subtotal' => 55000,
        ]);

        $order->items()->create([
            'item_name' => 'Jelajah Tata Surya',
            'item_category' => 'Astronomi',
            'item_subtitle' => 'Peralatan eksperimen bawa pulang',
            'price' => 30000,
            'quantity' => 1,
            'subtotal' => 30000,
        ]);

        $response = $this->get(route('invoice.show', $order->id));

        $response->assertStatus(200);
        $response->assertSee('INV-AMMA-2024001');
        $response->assertSee('Bapak Budi Santoso');
        $response->assertSee('Roadshow Sekolah: Energi Kinetik');
        $response->assertSee('Jelajah Tata Surya');
        $response->assertSee('87.500');
        $response->assertSee('Bank BCA');
        $response->assertSee('Bank Mandiri');
        $response->assertSee('Download Invoice');
        $response->assertSee('Konfirmasi Pembayaran via WhatsApp');
    }
}
