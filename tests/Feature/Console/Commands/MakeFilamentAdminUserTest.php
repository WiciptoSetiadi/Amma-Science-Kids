<?php

namespace Tests\Feature\Console\Commands;

use App\Models\User;
use Tests\TestCase;

class MakeFilamentAdminUserTest extends TestCase
{
    public function test_command_creates_user_with_admin_role(): void
    {
        $this->artisan('make:filament-admin-user')
            ->expectsQuestion('Name', 'Admin Terminal')
            ->expectsQuestion('Email address', 'admin@example.com')
            ->expectsQuestion('Password', 'password123')
            ->expectsQuestion('Confirm password', 'password123')
            ->assertSuccessful();

        $user = User::where('email', 'admin@example.com')->firstOrFail();

        $this->assertTrue($user->hasRole('admin'));
        $this->assertDatabaseHas('roles', [
            'name' => 'admin',
            'guard_name' => 'web',
        ]);
    }
}
