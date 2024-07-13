<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Website;
use App\Models\Subscription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class SubscriptionTest extends TestCase
{
    /**
     * A basic unit test create subscription example.
     */
    public function test_create_subscription()
    {

        $website = Website::factory()->create();

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@email.com',
        ]);

        $response = $this->postJson("/api/websites/{$website->id}/subscribe", [
            'user_id' => $user->id,
            'website_id' => $website->id,
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'user_id' => $user->id,
                     'website_id' => $website->id
                 ]);

        $this->assertDatabaseHas('subscriptions', [
            'user_id' => $user->id,
            'website_id' => $website->id
        ]);
    }
}
