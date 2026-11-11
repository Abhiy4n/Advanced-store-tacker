<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MeTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_see_me(): void
    {
        $this->getJson('/api/me')->assertUnauthorized();
    }

    public function test_user_can_see_me(): void
    {
        $user = User::factory()->create([
            'email' => 'staff@example.com',
            'role' => 'admin',
        ]);

        $this->actingAs($user)
            ->getJson('/api/me')
            ->assertOk()
            ->assertJsonPath('user.email', 'staff@example.com')
            ->assertJsonPath('user.role', 'admin');
    }
}
