<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostServiceImplement implements PostServiceInterface
{
    public function createPost(array $data): Post
    {
        if (isset($data['content']) && is_file($data['content'])) {
            $data['content'] = $data['content']->store('images', 'public');
        } else {
            $data['content'] = null;
        }

        return Post::create($data);
    }

    public function updatePost(Post $post, array $data): bool
    {
        if (isset($data['content']) && is_file($data['content'])) {
            if ($post->content && Storage::disk('public')->exists($post->content)) {
                Storage::disk('public')->delete($post->content);
            }
            $data['content'] = $data['content']->store('images', 'public');
        } else {
            $data['content'] = $post->content;
        }
        return $post->update($data);
    }

    public function deletePost(Post $post): bool
    {
        if ($post->content && Storage::disk('public')->exists($post->content)) {
            Storage::disk('public')->delete($post->content);
        }

        return $post->delete();
    }
}
