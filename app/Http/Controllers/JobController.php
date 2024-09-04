<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Services\JobServiceInterface;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    protected $jobService;

    public function __construct(JobServiceInterface $jobService)
    {
        $this->jobService = $jobService;
    }

    public function index()
    {
        $jobs = Job::with('post')->get();
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        $posts = Post::all();
        return view('jobs.create', compact('posts'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $this->jobService->createJob($data);

        // return redirect()->route('jobs.index');
        return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
    }

    public function edit(Job $job)
    {
        $posts = Post::all();
        return view('jobs.edit', compact('job', 'posts'));
    }

    // public function update(Request $request, Job $job)
    // {
    //     $job->update($request->validated());
    //     return redirect()->route('jobs.index')->with('success', 'Job updated successfully');
    // }

    public function update(Request $request, Job $job)
    {
        // Validasi data yang diterima dari form
        $validator = Validator::make($request->all(), [
            'platform' => 'required|string|max:255',
            'description' => 'required',
            'deadline' => 'required|date',
            'post_id' => 'required|exists:posts,id'
        ]);

        // Jika validasi gagal, kembali ke form dengan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Memperbarui job dengan data yang sudah divalidasi
        $job->update($request->only(['platform', 'description', 'deadline', 'post_id']));

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully');
    }

    public function destroy($id)
    {
        $job = Job::find($id);

        if ($job) {
            $job->delete();
            return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
        }

        return redirect()->route('jobs.index')->with('error', 'Job not found.');
    }
}
