<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class PostTest extends TestCase
{
    /**
     * A basic unit test create post example.
     */
    public function test_create_post()
    {

        $website = Website::factory()->create();

        $response = $this->postJson("/api/websites/{$website->id}/posts", [
            'title' => 'Test Post',
            'description' => 'This is a test post description.'
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'title' => 'Test Post',
                     'description' => 'This is a test post description.'
                 ]);

        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post',
            'description' => 'This is a test post description.',
            'website_id' => $website->id
        ]);

    }
}
