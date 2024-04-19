<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request, $user_id)
    {
        $userPosts = Post::where('user_id', $user_id)->paginate(10);
        return response()->json($userPosts, 200);
    }

    public function topPosts(Request $request)
    {
        $topPosts = Post::withCount('reviews')->orderByDesc('reviews_count')->paginate(10);

        return response()->json($topPosts, 200);
    }

    public function store(PostRequest $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->user_id,
        ]);

        return response()->json(['message' => 'Post created successfully', 'post' => $post], 201);
    }
}
