<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;
use App\Traits\ApiResponse;

class PostService implements PostRepository
{
    use ApiResponse;

    public function getAllPost()
    {
        return Post::paginate(10);
    }

    public function cretePost(array $postCreator)
    {
        return Post::create($postCreator);
    }

    public function showByIdPost(Post $post): Post
    {
        return $post;
    }

    public function updatePost(Post $post, array $postUpdate): bool
    {
        return $post->update($postUpdate);
    }

    public function deletePost(Post $post): ?bool
    {
        return $post->delete();
    }
}
