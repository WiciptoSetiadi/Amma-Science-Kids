<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    /**
     * Tampilkan halaman checkout.
     */
    public function index(): View|RedirectResponse
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('warning', 'Keranjang Anda masih kosong. Silakan pilih program terlebih dahulu.');
        }

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += ($item['price'] * $item['quantity']);
        }

        $serviceFee = 0; // Biaya layanan gratis
        $total = $subtotal + $serviceFee;

        $user = auth()->user();

        return view('checkout', [
            'cart' => $cart,
            'subtotal' => $subtotal,
            'serviceFee' => $serviceFee,
            'total' => $total,
            'user' => $user,
        ]);
    }

    /**
     * Proses pembuatan pesanan dan simpan ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('warning', 'Keranjang Anda masih kosong.');
        }

        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:50',
            'customer_email' => 'required|email|max:255',
            'notes' => 'nullable|string|max:1000',
        ]);

        $order = DB::transaction(function () use ($cart, $validated) {
            $subtotal = 0;
            foreach ($cart as $item) {
                $subtotal += ($item['price'] * $item['quantity']);
            }

            $serviceFee = 0;
            $totalAmount = $subtotal + $serviceFee;

            // Generate nomor invoice unik: INV-AMMA-YYYYXXXX
            $year = date('Y');
            $latestOrder = Order::latest('id')->first();
            $nextNumber = $latestOrder ? ($latestOrder->id + 1) : 1;
            $orderNumber = 'INV-AMMA-'.$year.str_pad((string) $nextNumber, 4, '0', STR_PAD_LEFT);

            $order = Order::create([
                'order_number' => $orderNumber,
                'user_id' => auth()->id(),
                'customer_name' => $validated['customer_name'],
                'customer_phone' => $validated['customer_phone'],
                'customer_email' => $validated['customer_email'],
                'notes' => $validated['notes'] ?? null,
                'subtotal' => $subtotal,
                'service_fee' => $serviceFee,
                'total_amount' => $totalAmount,
                'status' => 'menunggu_pembayaran',
                'payment_due_date' => now()->addDays(3),
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'program_id' => $item['program_id'] ?? null,
                    'item_name' => $item['title'],
                    'item_category' => $item['category'] ?? 'Program Sains',
                    'item_image' => $item['image'] ?? null,
                    'item_subtitle' => $item['subtitle'] ?? null,
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['price'] * $item['quantity'],
                ]);
            }

            session()->forget('cart');

            return $order;
        });

        return redirect()->route('invoice.show', $order->id)->with('success', 'Pesanan berhasil dibuat!');
    }

    /**
     * Tampilkan nota / invoice pesanan.
     */
    public function invoice(int $id): View
    {
        $order = Order::with('items')->findOrFail($id);

        return view('invoice', [
            'order' => $order,
        ]);
    }
}
