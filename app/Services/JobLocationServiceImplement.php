<?php

namespace App\Services;

use App\Repositories\JobLocationRepository;
use App\Models\JobLocation;


class JobLocationServiceImplement implements JobLocationServiceInterface
{

    protected $jobLocationRepository;

    public function __construct(JobLocationRepository $jobLocationRepository)
    {
        $this->jobLocationRepository = $jobLocationRepository;
    }

    public function getAll()
    {
        return JobLocation::all();
    }

    // public function find($id)
    // {
    //     return JobLocation::findOrFail($id);
    // }

    public function find($id)
    {
        return JobLocation::with(['job', 'location'])->findOrFail($id);
    }
    
    public function create(array $data)
    {
        return JobLocation::create($data);
    }

    public function update($id, array $data)
    {
        $jobLocation = JobLocation::findOrFail($id);
        $jobLocation->update($data);
    }

    public function delete($id)
    {
        $jobLocation = JobLocation::findOrFail($id);
        $jobLocation->delete();
    }

    public function exists($jobId, $locationId, $id)
    {
        return $this->jobLocationRepository->exists($jobId, $locationId, $id);
    }
}
