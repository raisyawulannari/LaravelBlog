<?php

namespace App\Services;

use App\Repositories\PostRepository;
use App\Models\Post;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function createPost(array $data): Post
    {
        return $this->postRepository->create($data);
    }

    public function updatePost(Post $post, array $data): bool
    {
        return $this->postRepository->update($post, $data);
    }

    public function deletePost(Post $post): bool
    {
        return $this->postRepository->delete($post);
    }
}
