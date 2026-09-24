<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactMessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_submit_contact_form(): void
    {
        $response = $this->post(route('kontak.store'), [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'subject' => 'Tanya Program',
            'message' => 'Halo, apakah ada diskon?',
        ]);

        $response->assertRedirect(route('kontak'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('contact_messages', [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'subject' => 'Tanya Program',
            'message' => 'Halo, apakah ada diskon?',
            'is_read' => 0,
        ]);
    }

    public function test_contact_form_requires_all_fields(): void
    {
        $response = $this->post(route('kontak.store'), []);

        $response->assertSessionHasErrors(['name', 'email', 'subject', 'message']);
    }
}
