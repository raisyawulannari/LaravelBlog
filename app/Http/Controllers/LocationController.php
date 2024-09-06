<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Services\LocationServiceInterface;
use App\Services\JobServiceInterface;

class LocationController extends Controller
{
    protected $locationService;
    protected $jobService;

    public function __construct(LocationServiceInterface $locationService, JobServiceInterface $jobService)
    {
        $this->locationService = $locationService;
        $this->jobService = $jobService;
    }

    public function index()
    {
        $locations = $this->locationService->getAllLocations();
        return view('locations.index', compact('locations'));
    }

    public function create()
    {
        // $jobs = $this->jobService->getAllJobs();
        $jobs = Job::all();
        return view('locations.create', compact('jobs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'address' => 'nullable|string',
            'jobs' => 'nullable|array',
        ]);

        $data = $request->only(['city', 'country', 'address']);
        $location = $this->locationService->createLocation($data);

        // Menyimpan relasi many-to-many jika ada
        // if ($request->has('jobs')) {
        //     $location->jobs()->sync($request->input('jobs'));
        // }

        return redirect()->route('locations.index')->with('success', 'Location created successfully.');
    }
    public function edit($id)
    {
        $location = Location::findOrFail($id); // Pastikan ini objek Location dengan relasi jobs
        //$jobs = Job::all(); // Mengambil semua jobs untuk digunakan di form select

        return view('locations.edit', compact('location'));
    }


    // public function edit(Location $location)
    // {
    //     $jobs = $this->jobService->getAllJobs();

    //     // Kirimkan lokasi dan pekerjaan ke view edit
    //     return view('locations.edit', ['location' => $location, 'job' => $jobs]);
    // }


    public function update(Request $request, $id)
    {
        $request->validate([
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'address' => 'nullable|string',
            'jobs' => 'nullable|array',
        ]);

        $data = $request->only(['city', 'country', 'address']);
        $location = $this->locationService->updateLocation($id, $data);

        // Update relasi many-to-many 
        if ($request->has('jobs')) {
            $location->jobs()->sync($request->input('jobs'));
        }

        return redirect()->route('locations.index')->with('success', 'Location updated successfully.');
    }

    public function destroy($id)
    {
        $location = $this->locationService->getLocation($id);

        if (!$location) {
            return redirect()->route('locations.index')->withErrors('Location not found');
        }

        $this->locationService->deleteLocation($id);
        return redirect()->route('locations.index')->with('success', 'Location deleted successfully.');
    }

    
}
