<?php
namespace App\Repositories;
use App\Models\Post;
use Illuminate\Http\Request;

interface PostRepository {
    public function getAllPost();
    public function cretePost(Request $request);
    public function showByIdPost(Post $post);
    public function updatePost(Post $post,Request $request);
    public function deletePost(Post $post);
}
