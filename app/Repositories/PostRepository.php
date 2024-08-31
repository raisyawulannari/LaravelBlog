<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostRepository
{

    public function create(array $data): Post
    {
      
        if (isset($data['content']) && is_file($data['content'])) {
            $data['content'] = $data['content']->store('images', 'public');
        } else {
            $data['content'] = null; 
        }

        return Post::create($data);
    }

    public function update($id, array $data)
    {
        $post = Post::find($id);
        if (!$post) {
            return false;
        }
   
    return $post->update($data);
}


    // public function update(Post $post, array $data): bool
    // {
       
    //     if (isset($data['content']) && is_file($data['content'])) {
            
    //         if ($post->content && Storage::disk('public')->exists($post->content)) {
    //             Storage::disk('public')->delete($post->content);
    //         }
            
    //         $data['content'] = $data['content']->store('images', 'public');
    //     } else {
    //         $data['content'] = $post->content;
    //     }

    //     return $post->update($data);
    // }
    // public function delete($id)
    // {
    //     if ($post->content && Storage::disk('public')->exists($post->content)) {
    //         Storage::disk('public')->delete($post->content);
    //     }

    //     return $post->delete();
    // }

    public function delete($id)
    {
    $post = Post::find($id);

    if ($post) {
        if ($post->content && Storage::disk('public')->exists($post->content)) {
            Storage::disk('public')->delete($post->content);
        }
       return $post->delete();
    }
    return false;
    }

    public function getAll()
    {
        return Post::all();
    }

    public function find($id): ?Post
    {
        return Post::find($id);
    }
}
