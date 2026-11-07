<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User as SocialiteUser;
use Tests\TestCase;

class GoogleAuthTest extends TestCase
{
    use RefreshDatabase;

    private function fakeGoogleUser(string $id = 'google-123', string $email = 'ilmuwan@gmail.com'): void
    {
        $googleUser = (new SocialiteUser)->map([
            'id' => $id,
            'name' => 'Ilmuwan Cilik',
            'email' => $email,
            'avatar' => 'https://example.com/avatar.png',
        ]);

        Socialite::shouldReceive('driver->user')->andReturn($googleUser);
    }

    public function test_login_and_register_pages_show_google_button(): void
    {
        $this->get(route('login'))->assertOk()->assertSee(route('auth.google'));
        $this->get(route('register'))->assertOk()->assertSee(route('auth.google'));
    }

    public function test_a_new_visitor_can_register_with_google(): void
    {
        $this->fakeGoogleUser();

        $this->get(route('auth.google.callback'))->assertRedirect(route('home'));

        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'email' => 'ilmuwan@gmail.com',
            'google_id' => 'google-123',
        ]);
        $this->assertTrue(auth()->user()->hasRole('user'));
    }

    public function test_an_existing_email_user_gets_linked_to_google(): void
    {
        $user = User::factory()->create(['email' => 'ilmuwan@gmail.com']);
        $this->fakeGoogleUser();

        $this->get(route('auth.google.callback'))->assertRedirect(route('home'));

        $this->assertAuthenticatedAs($user);
        $this->assertSame('google-123', $user->refresh()->google_id);
        $this->assertSame(1, User::count());
    }

    public function test_a_failed_google_login_returns_to_login_page(): void
    {
        Socialite::shouldReceive('driver->user')->andThrow(new \Exception('cancelled'));

        $this->get(route('auth.google.callback'))
            ->assertRedirect(route('login'))
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }
}