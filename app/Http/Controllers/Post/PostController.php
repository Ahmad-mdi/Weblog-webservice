<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostNewRequest;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Models\Post;
use App\Repositories\PostRepository;
use App\Services\PostService;

class PostController extends Controller
{
    private PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        $data = $this->postService->getAllPost();
        return $this->successResponse(200, $data, 'getOk');
    }

    public function store(PostNewRequest $request): \Illuminate\Http\JsonResponse
    {
        $orderDetails = $request->only([
            'title', 'image', 'body', 'user_id',
        ]);
        $data = $this->postService->cretePost($orderDetails);
        return $this->successResponse(200, $data, 'post created successfully');
    }

    public function show(Post $post): \Illuminate\Http\JsonResponse
    {
        $data = $this->postService->showByIdPost($post);
        return $this->successResponse(201, $data, 'getYourPost');
    }

    public function update(PostUpdateRequest $request, Post $post): \Illuminate\Http\JsonResponse
    {
        $orderDetails = $request->only([
            'title', 'image', 'body', 'user_id'
        ]);
        $this->postService->updatePost($post, $orderDetails);
        return $this->successResponse(200, $post, 'Post updated successfully');
    }

    public function destroy(Post $post): \Illuminate\Http\JsonResponse
    {
        $this->postService->deletePost($post);
        return $this->successResponse(200, $post, 'Your post deleted successfully');//for boolean call post binding
    }
}
