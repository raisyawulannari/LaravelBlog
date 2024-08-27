<?php

namespace App\Http\Controllers;

use App\Services\PostServiceInterface;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Menampilkan daftar semua post.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all(); // Ambil semua post dari database
        return view('posts.index', compact('posts')); // Kirim data ke view
    }

    /**
     * Menampilkan formulir untuk membuat post baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create'); // Tampilkan formulir untuk membuat post
    }

    /**
     * Simpan post baru ke database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->postService->createPost($data);

        return redirect()->route('posts.index');
    }

    /**
     * Menampilkan formulir untuk mengedit post yang ada.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post')); // Tampilkan formulir untuk mengedit post
    }

    /**
     * Perbarui post yang ada.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $this->postService->updatePost($post, $data);

        return redirect()->route('posts.index');
    }

    /**
     * Hapus post yang ada.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $this->postService->deletePost($post);

        return redirect()->route('posts.index');
    }
}
