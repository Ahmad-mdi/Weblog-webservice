<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;
use App\Traits\ApiResponse;
use Carbon\Carbon;
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
        $fileName = Carbon::now()->microsecond.'.'.$request->image->extension();
        $request->image->storeAs('image-posts',$fileName,'public');
        return Post::create([
            'title' => $request->title,
            'image' => $fileName,
            'body' => $request->body,
            'user_id' => $request->user_id,
        ]);
    }

    public function showByIdPost(Post $post): Post
    {
        return $post;
    }

    public function updatePost(Post $post,Request $request): bool
    {
        if ($request->has('image')) {
            $fileName = Carbon::now()->microsecond . '.' . $request->image->extension();
            $request->image->storeAs('images/posts',$fileName,'public');
        }
        return $post->update([
            'title' => $request->title,
            'image' => $request->has('image') ? $fileName : $post->image,
            'body' => $request->body,
            'user_id' => $request->user_id,
        ]);
    }

    public function deletePost(Post $post): ?bool
    {
        return $post->delete();
    }
}
