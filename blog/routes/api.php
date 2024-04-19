<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReviewController;

Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/user/{user_id}', [PostController::class, 'index']);
Route::get('/posts/top', [PostController::class, 'topPosts']);
Route::post('/posts/{post_id}/reviews', [ReviewController::class ,'store']);
