<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostNewRequest;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Models\Post;
use App\Services\PostService;
use Carbon\Carbon;

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

    public function store(PostNewRequest $request)
    {
        $data = $this->postService->cretePost($request);
        return $this->successResponse(200, $data, 'post created successfully');
    }

    public function show(Post $post): \Illuminate\Http\JsonResponse
    {
        $data = $this->postService->showByIdPost($post);
        return $this->successResponse(201, $data, 'getYourPost');
    }

    public function update(PostUpdateRequest $request, Post $post): \Illuminate\Http\JsonResponse
    {
        $this->postService->updatePost($post,$request);
        return $this->successResponse(200,$post,'post updated successfully');

    }

    public function destroy(Post $post): \Illuminate\Http\JsonResponse
    {
        $this->postService->deletePost($post);
        return $this->successResponse(200, $post, 'Your post deleted successfully');//for boolean call post binding
    }
}
