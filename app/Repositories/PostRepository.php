<?php
namespace App\Repositories;
use App\Models\Post;
use Illuminate\Http\Request;

interface PostRepository {
    public function getAllPost();
    public function cretePost(array $postCreator);
    public function showByIdPost(Post $post);
    public function updatePost(Post $post,array $postUpdate);
    public function deletePost(Post $post);
}
