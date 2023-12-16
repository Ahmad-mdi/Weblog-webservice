<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\ApiResponseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostNewRequest;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Models\Post;
use App\Services\PostService;

class PostController extends Controller
{
    public function index(PostService $service): \Illuminate\Http\JsonResponse
    {
        $data = $service->getAllPost();
        return $this->successResponse(201, $data, 'getAllDataOk');
    }

    public function store(PostNewRequest $request, PostService $service): \Illuminate\Http\JsonResponse
    {
        $data = $service->cretePost($request);
        return $this->successResponse(200, $data, 'post created successfully');
    }

    public function show(Post $post, PostService $service): \Illuminate\Http\JsonResponse
    {
        $data = $service->showByIdPost($post);
        return $this->successResponse(201, $data, 'getYourPost');
    }

    public function update(PostUpdateRequest $request, Post $post, PostService $service): \Illuminate\Http\JsonResponse
    {
        $data = $service->updatePost($request, $post);
        return $this->successResponse(200, $post, 'Post updated successfully');
    }

    public function destroy(Post $post, PostService $service): \Illuminate\Http\JsonResponse
    {
         $service->deletePost($post);
        return $this->successResponse(200,$post,'Your post deleted successfully');//for boolean call post binding
    }
}
