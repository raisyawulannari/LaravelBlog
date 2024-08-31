<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile; // Perbaiki tipe untuk file upload
use App\Models\Post;

interface PostService
{
    public function getAllPosts();

    public function createPost(array $data, UploadedFile $image = null); 

    public function updatePost($id, array $data, UploadedFile $image = null); 

    public function deletePost($id);

    public function storePost(Request $request): Post; 
}
