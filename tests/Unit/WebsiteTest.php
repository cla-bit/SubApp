<?php

namespace Tests\Unit;

use App\Models\Website;
use PHPUnit\Framework\TestCase;


class WebsiteTest extends TestCase
{
    /**
     * A basic unit test create website example.
     */
    public function test_create_website()
    {

        $response = $this->postJson('/api/websites', [
            'name' => 'Test Website',
            'url' => 'http://testwebsite.com'
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'name' => 'Test Website',
                     'url' => 'http://testwebsite.com'
                 ]);

        $this->assertDatabaseHas('websites', [
            'name' => 'Test Website',
            'url' => 'http://testwebsite.com'
        ]);

    }
}
