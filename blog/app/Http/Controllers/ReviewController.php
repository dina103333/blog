<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, $post_id)
    {
        $post = Post::find($post_id);
        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $review = Review::create([
            'post_id' => $post_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'user_id' => $request->user_id
        ]);

        return response()->json(['message' => 'Review added successfully', 'review' => $review], 201);
    }
}
