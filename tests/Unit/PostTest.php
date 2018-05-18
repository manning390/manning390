<?php

namespace Tests\Unit;

use App\Post;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PostTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function can_set_slug() {
        // Arrange
        $post = factory(Post::class)->create([
        // $post = Post::create([
            'title' => 'An Unnecessarily Long Title',
            'body' => 'test',
            'published_at' => Carbon::parse('December 20th, 2017'),
        ]);

        // Assert
        $this->assertEquals('20171220_an_unnecessarily_long_title', $post->slug);
    }

    /** @test */
    public function can_get_formatted_published() {
        // Arrange
        $project = factory(Post::class)->create([
            'published_at' => Carbon::parse('2015-12-01 7:00pm')
        ]);

        // Assert
        $this->assertEquals('December 1, 2015', $project->formatted_published);
    }

    /** @test */
    public function can_be_published_in_future() {
        $post1 = factory(Post::class)->create();
        $post2 = factory(Post::class)->states('unpublished')->create();
        $post3 = factory(Post::class)->create([
            'published_at' => null
        ]);

        $this->assertEquals(true,  $post1->isPublished());
        $this->assertEquals(false, $post2->isPublished());
        $this->assertEquals(false, $post3->isPublished());
    }

    /** @test */
    public function can_be_queried_by_published() {
        // Arrange
        $post = factory(Post::class)->create();

        // Act
        $count = Post::published()->count();

        // Assert
        $this->assertEquals(1, $count);
    }
}
