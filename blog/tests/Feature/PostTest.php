<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use App\Models\Review;


class PostTest extends TestCase
{
    use RefreshDatabase;

    public function testAddPost()
    {
        $user = User::factory()->create();
        $user = User::first();

        $response = $this->postJson('/api/posts', [
            'title' => 'Test Post',
            'body' => 'This is a test post.',
            'user_id' => $user->id,
        ]);

        $response->assertStatus(201)
                 ->assertJsonStructure(['message', 'post']);
    }

    public function testListUserPosts()
    {
        $user = User::factory()->create();
        $posts = Post::factory()->count(5)->create(['user_id' => $user->id]);

        $user = User::first();
        $response = $this->getJson("/api/posts/user/{$user->id}");

        $response->assertStatus(200);
    }

    public function testListTopPosts()
    {
        $posts = Post::factory()->count(10)->create();

        // Add reviews to the posts
        foreach ($posts as $post) {
            Review::factory()->count(3)->create(['post_id' => $post->id]);
        }

        $response = $this->getJson('/api/posts/top');

        $response->assertStatus(200);
    }

    public function testAddReviewToPost()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();
        $user = User::first();
        $post = Post::first();

        $response = $this->postJson("/api/posts/{$post->id}/reviews", [
            'rating' => 4,
            'comment' => 'Great post!',
            'user_id' => $user->id,
        ]);

        $response->assertStatus(201)
                ->assertJsonStructure(['message', 'review']);
    }

}
