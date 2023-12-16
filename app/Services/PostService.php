<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class PostService implements PostRepository
{
    use ApiResponse;

    public function getAllPost()
    {
        return Post::paginate(10);
    }

    public function cretePost(Request $request)
    {
        return Post::create([
            'title' => $request->title,
            'image' => $request->image,
            'body' => $request->body,
            'user_id' => $request->user_id,
        ]);
    }

    public function showByIdPost(Post $post): Post
    {
        return $post;
    }

    public function updatePost(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->title,
            'image' => $request->image,
            'body' => $request->body,
            'user_id' => $request->user_id,
        ]);
        return $post;
    }

    public function deletePost(Post $post): ?bool
    {
        return $post->delete();
//        return $this->successResponse(201, $post, 'Your Post deleted successfully');
    }
}
