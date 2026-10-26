<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_and_register_pages_are_available(): void
    {
        $this->get(route('login'))
            ->assertOk()
            ->assertSee('Selamat Datang')
            ->assertSee(route('register'));

        $this->get(route('register'))
            ->assertOk()
            ->assertSee('Bergabung dengan Komunitas')
            ->assertSee(route('login'));
    }

    public function test_a_visitor_can_register(): void
    {
        $response = $this->post(route('register.store'), [
            'name' => 'Ilmuwan Cilik',
            'email' => 'ilmuwan@example.com',
            'whatsapp_number' => '081234567890',
            'password' => 'kata-sandi-aman',
            'password_confirmation' => 'kata-sandi-aman',
        ]);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'email' => 'ilmuwan@example.com',
            'whatsapp_number' => '081234567890',
        ]);
    }

    public function test_registration_requires_a_matching_password_confirmation(): void
    {
        $response = $this->from(route('register'))->post(route('register.store'), [
            'name' => 'Ilmuwan Cilik',
            'email' => 'ilmuwan@example.com',
            'whatsapp_number' => '081234567890',
            'password' => 'kata-sandi-aman',
            'password_confirmation' => 'berbeda',
        ]);

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('password');
    }

    public function test_a_registered_user_can_login(): void
    {
        $user = User::factory()->create([
            'email' => 'ilmuwan@example.com',
            'password' => Hash::make('kata-sandi-aman'),
        ]);

        $response = $this->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'kata-sandi-aman',
            'remember' => true,
        ]);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticatedAs($user);
        $this->assertNotNull($user->refresh()->remember_token);
    }

    public function test_an_authenticated_user_can_logout_before_visiting_auth_pages_again(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('login'))
            ->assertRedirect(route('home'));

        $this->actingAs($user)
            ->post(route('logout'))
            ->assertRedirect(route('home'));

        $this->assertGuest();
        $this->get(route('register'))->assertOk();
    }

    public function test_public_page_navigation_reflects_authentication_state_after_logout(): void
    {
        $user = User::factory()->create();
        $article = Article::factory()->create();
        $pages = [
            route('home'),
            route('tentang'),
            route('program'),
            route('artikel'),
            route('artikel.detail', $article->slug),
            route('galeri'),
            route('kontak'),
        ];

        $this->actingAs($user);

        foreach ($pages as $page) {
            $this->get($page)
                ->assertOk()
                ->assertSee('Keluar');
        }

        $this->post(route('logout'))->assertRedirect(route('home'));
        $this->assertGuest();

        foreach ($pages as $page) {
            $this->get($page)
                ->assertOk()
                ->assertSee('Masuk')
                ->assertDontSee('Keluar');
        }
    }
}
