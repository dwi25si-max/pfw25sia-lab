<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_login_page(): void
    {
        $response = $this->get(route('login'));
        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    public function test_user_can_login_and_see_name_in_header(): void
    {
        $user = User::create([
            'name' => 'Daffa SIA',
            'email' => 'daffa@example.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post(route('auth.login'), [
            'email' => 'daffa@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('dashboard.index'));
        $response->assertSessionHas('last_login');
        $this->assertAuthenticatedAs($user);

        // Follow redirect to dashboard and assert user name appears in header
        $dashboardResponse = $this->get(route('dashboard.index'));
        $dashboardResponse->assertStatus(200);
        $dashboardResponse->assertSee('Daffa SIA');
    }

    public function test_login_fails_with_invalid_credentials(): void
    {
        $response = $this->post(route('auth.login'), [
            'email' => 'wrong@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_user_can_logout(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('logout'));
        $response->assertRedirect(route('auth.index'));
        $this->assertGuest();
    }

    public function test_dashboard_redirects_to_login_when_not_authenticated(): void
    {
        $response = $this->get(route('dashboard.index'));
        $response->assertRedirect(route('login'));
    }
}
