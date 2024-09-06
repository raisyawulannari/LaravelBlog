<?php

namespace App\Services;
use App\Models\JobLocation;


class JobLocationService
{
    protected $jobLocationService;

    public function __construct(JobLocationServiceInterface $jobLocationService)
    {
        $this->jobLocationService = $jobLocationService;
    }

    public function getAll()
    {
        // Memuat relasi 'job' dan 'location'
        return JobLocation::with(['job', 'location'])->get();
    }


    public function create(array $data)
    {
        return $this->jobLocationService->create($data);
    }

    public function update($id, array $data)
    {
        return $this->jobLocationService->update($id, $data);
    }

    public function delete($id)
    {
        return $this->jobLocationService->delete($id);
    }

   
}
