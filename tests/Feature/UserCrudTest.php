<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserCrudTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Create an admin user for authentication
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);
    }

    /** @test */
    public function it_displays_the_user_index_page(): void
    {
        $response = $this->get(route('user.index'));
        $response->assertOk()->assertViewIs('admin.user.index');
    }

    /** @test */
    public function it_shows_the_create_form(): void
    {
        $response = $this->get(route('user.create'));
        $response->assertOk()->assertViewIs('admin.user.create');
    }

    /** @test */
    public function validation_fails_when_required_fields_are_missing(): void
    {
        $response = $this->post(route('user.store'), []);
        $response->assertSessionHasErrors(['name', 'email', 'password', 'role']);
    }

    /** @test */
    public function validation_fails_when_password_is_not_confirmed(): void
    {
        $response = $this->post(route('user.store'), [
            'name' => 'Budi',
            'email' => 'budi@example.com',
            'password' => 'password123',
            'password_confirmation' => 'differentpassword',
            'role' => 'user',
        ]);
        $response->assertSessionHasErrors(['password']);
    }

    /** @test */
    public function it_can_store_a_user_with_hashed_password(): void
    {
        $email = 'test_' . time() . '@example.com';
        $response = $this->post(route('user.store'), [
            'name' => 'Test User',
            'email' => $email,
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
            'role' => 'admin',
        ]);

        $response->assertRedirect(route('user.index'));
        $response->assertSessionHas('success');

        $user = User::where('email', $email)->first();
        $this->assertNotNull($user);
        $this->assertEquals('Test User', $user->name);
        $this->assertEquals('admin', $user->role);
        $this->assertTrue(Hash::check('secret123', $user->password));
    }

    /** @test */
    public function it_shows_the_edit_form(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $response = $this->get(route('user.edit', $user->id));
        $response->assertOk()->assertViewIs('admin.user.edit');
    }

    /** @test */
    public function it_can_update_a_user(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $response = $this->put(route('user.update', $user->id), [
            'name' => 'Updated Name',
            'email' => $user->email,
            'role' => 'admin',
        ]);

        $response->assertRedirect(route('user.index'));
        $response->assertSessionHas('success');

        $user->refresh();
        $this->assertEquals('Updated Name', $user->name);
        $this->assertEquals('admin', $user->role);
    }

    /** @test */
    public function it_can_delete_a_user(): void
    {
        $user = User::factory()->create();
        $response = $this->delete(route('user.destroy', $user->id));
        $response->assertRedirect(route('user.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
