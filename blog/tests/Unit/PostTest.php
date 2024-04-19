<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;
use App\Models\Review;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function testAddPost()
    {
        $user = User::factory()->create();
        $postData = [
            'title' => 'Test Post',
            'body' => 'This is a test post.',
            'user_id' => $user->id,
        ];

        Post::create($postData);

        $this->assertDatabaseHas('posts', ['title' => 'Test Post']);
    }

    public function testListUserPosts()
    {
        $user = User::factory()->create();
        $posts = Post::factory()->count(5)->create(['user_id' => $user->id]);

        $userPosts = Post::where('user_id', $user->id)->get();

        $this->assertCount(5, $userPosts);
    }

    public function testListTopPosts()
    {
        $posts = Post::factory()->count(10)->create();

        foreach ($posts as $post) {
            Review::factory()->count(3)->create(['post_id' => $post->id]);
        }

        $topPosts = Post::withCount('reviews')->orderByDesc('reviews_count')->take(10)->get();

        $this->assertCount(10, $topPosts);
    }

    public function testAddReviewToPost()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();
        $reviewData = [
            'rating' => 4,
            'comment' => 'Great post!',
            'user_id' => $user->id,
            'post_id' => $post->id,
        ];

        Review::create($reviewData);

        $this->assertDatabaseHas('reviews', ['comment' => 'Great post!']);
    }
}
