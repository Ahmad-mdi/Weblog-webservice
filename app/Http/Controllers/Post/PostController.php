<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostNewRequest;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Http\Resources\PostResource;
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
        return $this->successResponse(200, [
            PostResource::collection($data),
            'link'=> PostResource::collection($data)->response()->getData()->links,
            'meta'=> PostResource::collection($data)->response()->getData()->meta
        ], 'getOk');
    }

    public function store(PostNewRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $this->postService->cretePost($request);
        return $this->successResponse(200, new PostResource($data), 'post created successfully');
    }

    public function show(Post $post): \Illuminate\Http\JsonResponse
    {
        $data =  $this->postService->showByIdPost($post);
        return $this->successResponse(201, new PostResource($data), 'getYourPost');
    }

    public function update(PostUpdateRequest $request, Post $post): \Illuminate\Http\JsonResponse
    {
        $this->postService->updatePost($post,$request);
        return $this->successResponse(200,new PostResource($post),'post updated successfully');
    }

    public function destroy(Post $post): \Illuminate\Http\JsonResponse
    {
        $this->postService->deletePost($post);
        return $this->successResponse(200, new PostResource($post), 'Your post deleted successfully');//for boolean call post binding
    }
}
