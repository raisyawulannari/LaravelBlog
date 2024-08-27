<?php

namespace App\Services;

use App\Models\Post;

interface PostServiceInterface
{
    public function createPost(array $data): Post;
    public function updatePost(Post $post, array $data): bool;
    public function deletePost(Post $post): bool;
}
