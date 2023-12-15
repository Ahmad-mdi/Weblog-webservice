<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\ApiResponseController;
use App\Http\Requests\Post\PostRequest;
use App\Http\Services\PostService;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends ApiResponseController
{

    public function index(PostService $service): \Illuminate\Http\JsonResponse
    {
        return $service->getAllPost();
    }


    public function store(PostRequest $request, PostService $service): \Illuminate\Http\JsonResponse
    {
       return $service->newPost($request);
    }

    public function show(Post $post,PostService $service): \Illuminate\Http\JsonResponse
    {
        return $service->showById($post);
    }

    public function update(Request $request, Post $post)
    {

    }


    public function destroy(Post $post)
    {
        //
    }
}
