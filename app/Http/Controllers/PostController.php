<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Services\PostService; 
use App\Models\Post;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService) 
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getAllPosts(); 
        return view('posts.index', compact('posts')); 
    }

    public function create()
    {
        return view('posts.create'); 
    }

    public function store(PostRequest $request)
    {
        $validatedData = $request->validated();
        $this->postService->createPost($validatedData, $request->file('image'));
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

     public function edit($id)
    {
        $post = $this->postService->findPost($id);
        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, $id)
    {
        $validatedData = $request->validated();
         $this->postService->updatePost($id, $validatedData, $request->file('content'));
        // $image = $request->file('image');
        // $this->postService->updatePost($id, $validatedData, $image);
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }


    // public function destroy(Post $post)
    // {
    //     $this->postService->deletePost($id);
    //     return redirect()->route('posts.index')->with('success', 'Post successfully deleted.');
    // }

    public function destroy(Post $post)
{
    $this->postService->deletePost($post->id);
    return redirect()->route('posts.index')->with('success', 'Post successfully deleted.');
}

}
