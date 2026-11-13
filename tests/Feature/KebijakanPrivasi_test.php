<?php

namespace Tests\Feature;

use Tests\TestCase;

class PrivacyPolicyTest extends TestCase
{
    public function test_privacy_policy_page_is_publicly_available(): void
    {
        $this->get(route('kebijakan-privasi'))
            ->assertOk()
            ->assertSee('Kebijakan Privasi')
            ->assertSee('Penggunaan Data Pengguna Google')
            ->assertSee('ammasciencekids@gmail.com');
    }

    public function test_english_alias_redirects_to_privacy_policy(): void
    {
        $this->get('/privacy-policy')
            ->assertRedirect('/kebijakan-privasi');
    }

    public function test_homepage_footer_links_to_privacy_policy(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee(route('kebijakan-privasi'));
    }
}
