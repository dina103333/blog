<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $maxposts = 50000;
        $totalUsers = $users->count();
        $maxPostsPerUser = ceil($maxposts / $totalUsers);
        foreach ($users as $user) {
            $numPosts = rand(1, $maxPostsPerUser);
            for ($i = 0; $i < $numPosts; $i++) {
                Post::factory()->create(['user_id' => $user->id]);
            }
        }
    }
}
