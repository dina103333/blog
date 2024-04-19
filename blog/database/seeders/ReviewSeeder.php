<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();
        $users = User::all();

        $maxReviews = 25000;
        $totalPosts = $posts->count();
        $maxReviewsPerPost = ceil($maxReviews / $totalPosts);

        foreach ($posts as $post) {
            $numReviews = rand(1, $maxReviewsPerPost);
            for ($i = 0; $i < $numReviews; $i++) {
                Review::factory()->create([
                    'post_id' => $post->id,
                    'user_id' => $users->random()->id,
                ]);
            }
        }
    }
}
