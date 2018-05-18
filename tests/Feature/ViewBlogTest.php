<?php

namespace Tests\Feature;

use App\Post;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewBlogTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function user_can_view_blog_index() {
        // Arrange
        $posts = factory(Post::class, 3)->make()->each(function($post, $i) {
            $post->title = 'An Amazing Post ' . $i;
            $post->save();
        });

        // Act
        $response = $this->get('/blog/');

        // Assert
        $response->assertStatus(200);
        $response->assertSee('An Amazing Post 0');
        $response->assertSee('An Amazing Post 1');
        $response->assertSee('An Amazing Post 2');
    }

    /** @test */
    public function user_can_view_a_blog_post() {
        // Arrange
        $post = factory(Post::class)->create([
            'title' => 'Programming sucks',
            'body' => 'it really does',
            'published_at' => Carbon::parse('12/7/17')
        ]);

        // Act
        $response = $this->get('/blog/' . $post->slug);

        // Assert
        $response->assertStatus(200);
        $response->assertSee('Programming sucks');
        $response->assertSee('it really does');
        $response->assertSee('December 7, 2017');
    }

    /** @test */
    public function user_cannot_view_an_unpublished_post() {
        // Arrange
        $post = factory(Post::class)->create([
            'published_at' => Carbon::parse('5/3/2018'),
            'title' => 'My future post'
        ]);
        // Hard coding because slug generation method is private
        // Upon save, the slug is set to null, so this can never happen
        $post->slug = "20180503_my_future_post";

        // Act
        $response = $this->get('/blog/' . $post->slug);

        // Assert
        $response->assertStatus(404);
    }

    /** @test */
    public function is_accessible_via_named_route() {
        $post = factory(Post::class)->create();

        $response = $this->get(route('blog.index'));
        $response->assertStatus(200);

        $response = $this->get(route('blog.show', $post->slug));
        $response->assertStatus(200);
    }
}
