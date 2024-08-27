<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostRepository implements PostRepositoryInterface
{
    /**
     * Buat post baru
     *
     * @param array $data
     * @return Post
     */
    public function create(array $data): Post
    {
        if (isset($data['content']) && is_file($data['content'])) {
            $data['content'] = $data['content']->store('images', 'public');
        } else {
            $data['content'] = null;
        }

        return Post::create($data);
    }

    /**
     * Perbarui post yang ada
     *
     * @param Post $post
     * @param array $data
     * @return bool
     */
    public function update(Post $post, array $data): bool
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

    /**
     * Hapus post yang ada
     *
     * @param Post $post
     * @return bool
     */
    public function delete(Post $post): bool
    {
        if ($post->content && Storage::disk('public')->exists($post->content)) {
            Storage::disk('public')->delete($post->content);
        }

        return $post->delete();
    }
}
