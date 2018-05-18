<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewAboutTest extends TestCase
{
    /** @test */
    public function user_can_view_about_info() {
        // Arrange
        // Act
        $response = $this->get('/');

        // Assert
        $response->assertStatus(200);
        $response->assertSee(e(config('blog.email')));
    }

    public function about_is_accessible_via_route_name() {

    }

    /** @test */
    public function is_accessible_via_named_route() {
        // Arrange
        // Act
        $response = $this->get(route('about'));

        // Assert
        $response->assertStatus(200);
    }
}
