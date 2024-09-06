<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobLocationRequest;
use App\Models\Job;
use App\Models\Location;
use App\Services\JobLocationServiceInterface;
use Illuminate\Http\Request;


class JobLocationController extends Controller
{
    protected $jobLocationService;

    public function __construct(JobLocationServiceInterface $jobLocationService)
    {
        $this->jobLocationService = $jobLocationService;
    }

    public function index()
    {
        $jobLocations = $this->jobLocationService->getAll();
        return view('job_locations.index', compact('jobLocations'));
    }

    // public function create()
    // {
    //     return view('job_locations.create');
    // }

    public function create()
    {
        $jobs = Job::all(); // Ambil semua data job
        $locations = Location::all(); // Ambil semua data location

        return view('job_locations.create', compact('jobs', 'locations'));
    }

    public function store(JobLocationRequest $request)
    {
        $validatedData = $request->validated();
        $this->jobLocationService->create($validatedData);

        $exists = $this->jobLocationService->exists($validatedData['job_id'], $validatedData['location_id'], 0);

        if ($exists) {
            return redirect()->back()->withErrors(['job_id' => 'This Job Location combination already exists']);
        }

        $this->jobLocationService->create($validatedData);

        return redirect()->route('job_locations.index')->with('success', 'Job-Location relation created successfully.');
    }


    public function edit($id)
    {
        $jobLocation = $this->jobLocationService->find($id);
        $jobs = Job::all(); // Ambil semua data pekerjaan
        $locations = Location::all(); // Ambil semua data lokasi, jika perlu

        return view('job_locations.edit', compact('jobLocation', 'jobs', 'locations'));
    }


    public function update(JobLocationRequest $request, $id)
    {
        $validatedData = $request->validated();

        $exists = $this->jobLocationService->exists($validatedData['job_id'], $validatedData['location_id'], $id);

        if ($exists) {
            return redirect()->back()->withErrors(['job_id' => 'This Job Location combination already exists']);
        }

        $this->jobLocationService->update($id, $validatedData);

        return redirect()->route('job_locations.index')->with('success', 'Job Location updated successfully!');
    }

    public function destroy($id)
    {
        $this->jobLocationService->delete($id);
        return redirect()->route('job_locations.index')->with('success', 'Job-Location relation deleted successfully.');
    }
}
