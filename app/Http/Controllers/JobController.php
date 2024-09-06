<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Post;
use App\Models\Location;
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
        $jobs = Job::with('post', 'location')->get(); // Memuat relasi locations
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        $posts = Post::all();
        $location = Location::all(); // Ambil semua lokasi
        return view('jobs.create', compact('posts', 'location'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validator = Validator::make($request->all(), [
            'activity_name' => 'required|string|max:255',
            'platform' => 'required|string|max:255',
            'description' => 'required',
            'deadline' => 'required|date',
            'post_id' => 'required|exists:posts,id',
            'location' => 'array|exists:location,id' // Validasi untuk lokasi
        ]);

        // Jika validasi gagal, kembali ke form dengan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Menyimpan job dan relasi lokasi
        $job = $this->jobService->createJob($request->only(['activity_name', 'platform', 'description', 'deadline', 'post_id']));
        $job->location()->sync($request->input('location', [])); // Menyimpan relasi lokasi

        return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
    }

    public function edit(Job $job) 
    {
        $posts = Post::all();
        $location = Location::all(); // Ambil semua lokasi
        return view('jobs.edit', compact('job', 'posts', 'location'));
    }

    public function update(Request $request, Job $job)
    {
        // Validasi data yang diterima dari form
        $validator = Validator::make($request->all(), [
            'activity_name' => 'required|string|max:255',
            'platform' => 'required|string|max:255',
            'description' => 'required',
            'deadline' => 'required|date',
            'post_id' => 'required|exists:posts,id',
            'location' => 'array|exists:location,id' // Validasi untuk lokasi
        ]);

        // Jika validasi gagal, kembali ke form dengan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Memperbarui job dengan data yang sudah divalidasi
        $job->update($request->only(['activity_name', 'platform', 'description', 'deadline', 'post_id']));
        $job->location()->sync($request->input('locations', [])); // Menyimpan relasi lokasi

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }
}
