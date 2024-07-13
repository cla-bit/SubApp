<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Website;
use App\Models\Subscription;
use PHPUnit\Framework\TestCase;

class SubscriptionTest extends TestCase
{
    /**
     * A basic unit test create subscription example.
     */
    public function test_create_subscription()
    {

        $website = Website::factory()->create();

        $response = $this->postJson("/api/websites/{$website->id}/subscribe", [
            'name' => 'Test User',
            'email' => 'testuser@example.com'
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'user_id' => User::where('email', 'testuser@example.com')->first()->id,
                     'website_id' => $website->id
                 ]);

        $this->assertDatabaseHas('subscriptions', [
            'user_id' => User::where('email', 'testuser@example.com')->first()->id,
            'website_id' => $website->id
        ]);
    }
}
