<?php

namespace Tests\Feature;

use App\Models\User;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_forgot_password_page_can_be_rendered(): void
    {
        $response = $this->get(route('password.request'));

        $response->assertOk();
        $response->assertSee('Lupa');
        $response->assertSee('Kata Sandi');
        $response->assertSee('Kirim Tautan Reset');
    }

    public function test_password_reset_link_can_be_requested(): void
    {
        Notification::fake();

        $user = User::factory()->create([
            'email' => 'peneliti@example.com',
        ]);

        $response = $this->post(route('password.email'), [
            'email' => 'peneliti@example.com',
        ]);

        $response->assertSessionHas('status');
        Notification::assertSentTo($user, ResetPasswordNotification::class);
    }

    public function test_password_reset_link_fails_when_email_does_not_exist(): void
    {
        Notification::fake();

        $response = $this->from(route('password.request'))->post(route('password.email'), [
            'email' => 'tidakada@example.com',
        ]);

        $response->assertRedirect(route('password.request'));
        $response->assertSessionHasErrors('email');
        Notification::assertNothingSent();
    }

    public function test_password_reset_request_is_rate_limited(): void
    {
        for ($attempt = 0; $attempt < 5; $attempt++) {
            $this->post(route('password.email'), ['email' => 'test@example.com']);
        }

        $this->post(route('password.email'), ['email' => 'test@example.com'])
            ->assertTooManyRequests();
    }

    public function test_reset_password_page_can_be_rendered(): void
    {
        $user = User::factory()->create([
            'email' => 'peneliti@example.com',
        ]);

        $token = Password::createToken($user);

        $response = $this->get(route('password.reset', [
            'token' => $token,
            'email' => $user->email,
        ]));

        $response->assertOk();
        $response->assertSee($token);
        $response->assertSee($user->email);
        $response->assertSee('Simpan Kata Sandi');
    }

    public function test_password_can_be_reset_with_valid_token(): void
    {
        $user = User::factory()->create([
            'email' => 'peneliti@example.com',
            'password' => Hash::make('password-lama-123'),
        ]);

        $token = Password::createToken($user);

        $response = $this->post(route('password.update'), [
            'token' => $token,
            'email' => $user->email,
            'password' => 'kata-sandi-baru-123',
            'password_confirmation' => 'kata-sandi-baru-123',
        ]);

        $response->assertRedirect(route('login'));
        $response->assertSessionHas('status');

        $this->assertTrue(Hash::check('kata-sandi-baru-123', $user->fresh()->password));
    }

    public function test_password_cannot_be_reset_with_invalid_token(): void
    {
        $user = User::factory()->create([
            'email' => 'peneliti@example.com',
            'password' => Hash::make('password-lama-123'),
        ]);

        $response = $this->from(route('password.reset', ['token' => 'invalid-token', 'email' => $user->email]))
            ->post(route('password.update'), [
                'token' => 'invalid-token',
                'email' => $user->email,
                'password' => 'kata-sandi-baru-123',
                'password_confirmation' => 'kata-sandi-baru-123',
            ]);

        $response->assertRedirect(route('password.reset', ['token' => 'invalid-token', 'email' => $user->email]));
        $response->assertSessionHasErrors('email');
        $this->assertTrue(Hash::check('password-lama-123', $user->fresh()->password));
    }

    public function test_password_cannot_be_reset_with_mismatched_confirmation(): void
    {
        $user = User::factory()->create([
            'email' => 'peneliti@example.com',
        ]);

        $token = Password::createToken($user);

        $response = $this->from(route('password.reset', ['token' => $token, 'email' => $user->email]))
            ->post(route('password.update'), [
                'token' => $token,
                'email' => $user->email,
                'password' => 'kata-sandi-baru-123',
                'password_confirmation' => 'berbeda-123',
            ]);

        $response->assertRedirect(route('password.reset', ['token' => $token, 'email' => $user->email]));
        $response->assertSessionHasErrors('password');
    }
}

