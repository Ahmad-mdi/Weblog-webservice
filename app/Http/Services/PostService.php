<?php

namespace App\Http\Services;

use App\Http\Controllers\ApiResponseController;
use App\Models\Post;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class PostService
{
    use ApiResponse;

    public function getAllPost(): \Illuminate\Http\JsonResponse
    {
        return $this->successResponse(200, Post::all(), 'The data displayed successfully');
    }

    public function newPost(Request $request): \Illuminate\Http\JsonResponse
    {
        $postCreator = Post::query()->create([
            'title' => $request->get('title'),
            'image' => $request->get('image'),
            'body' => $request->get('body'),
            'user_id' => $request->get('user_id'),
        ]);
        $data = $postCreator->orderBy('id', 'desc')->first();
        return $this->successResponse(200, $data, 'Your data inserted successfully');
    }

    public function showById(Post $post): \Illuminate\Http\JsonResponse
    {
        return $this->successResponse(201, $post, 'getOk');
    }
}
