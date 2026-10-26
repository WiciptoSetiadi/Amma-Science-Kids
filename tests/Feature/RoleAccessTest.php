<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RoleAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_filament_admin_panel(): void
    {
        Role::findOrCreate('admin', 'web');

        $admin = User::factory()->create([
            'email' => 'admin@ammasciencekids.com',
        ]);
        $admin->assignRole('admin');

        $this->actingAs($admin)
            ->get('/admin')
            ->assertSuccessful();
    }

    public function test_regular_user_cannot_access_filament_admin_panel(): void
    {
        Role::findOrCreate('user', 'web');

        $user = User::factory()->create([
            'email' => 'user@example.com',
        ]);
        $user->assignRole('user');

        $this->actingAs($user)
            ->get('/admin')
            ->assertForbidden();
    }

    public function test_registered_user_automatically_gets_user_role(): void
    {
        $this->post(route('register.store'), [
            'name' => 'Member Baru',
            'email' => 'member@example.com',
            'whatsapp_number' => '081234567899',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $user = User::where('email', 'member@example.com')->first();

        $this->assertNotNull($user);
        $this->assertTrue($user->hasRole('user'));
        $this->assertFalse($user->hasRole('admin'));
    }
}
