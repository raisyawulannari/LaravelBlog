<?php

namespace App\Services;

use App\Repositories\PostRepository;
use Illuminate\Http\UploadedFile; // Perbaiki namespace
use Illuminate\Http\Request;
use App\Models\Post;

class PostServiceImplement implements PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function findPost($id)
    {
        return $this->postRepository->find($id);
    }

    public function getAllPosts()
    {
        return $this->postRepository->getAll();
    }

    public function createPost(array $data, UploadedFile $image = null) // Perbaiki tipe
    {
        if ($image) {
            $data['image'] = $image->store('images', 'public');
        }
        return $this->postRepository->create($data);
    }

    public function updatePost($id, array $data, UploadedFile $image = null) 
    {
        $post = $this->postRepository->find($id);
       
            if ($image) {
                if ($post->content){
                $oldImagePath = storage_path('app/public/' . $post->content); 
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $data['content'] = $image->store('images', 'public');
        } else {
            $data['content'] = $post->content;
        }
        return $this->postRepository->update($id, $data);
    
    }
    public function deletePost($id)
    {
    $post = $this->postRepository->find($id);
    if ($post->image) {
        $oldImagePath = storage_path('app/public/' . $post->image);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }

    return $this->postRepository->delete($id);
}


    public function storePost(Request $request): Post
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|file|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'status' => 'required|integer'
        ]);

        if ($request->hasFile('content')) {
            $file = $request->file('content');
            $filePath = $file->store('images', 'public');
            $data['content'] = $filePath;
        } else {
            $data['content'] = null;
        }

        // Tambahkan status ke data
        $data['status'] = $request->input('status');

        return $this->createPost($data); // Simpan post menggunakan repository
    }
}
