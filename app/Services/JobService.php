<?php

namespace App\Services;

use App\Repositories\JobRepository;
use App\Models\Job;

class JobService
{
    protected $jobRepository;

    public function __construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    public function createJob(array $data): Job
    {
        // $data['platform'] = $data['platform'] ?? 'default_value';
        // $data['description'] = $data['description'] ?? 'default_value';
        return $this->jobRepository->create($data);
    }

    public function updateJob(Job $jobs, array $data): Job
    {
        return $this->jobRepository->update($jobs, $data);
    }

    public function deleteJob(Job $jobs): Job
    {
        return $this->jobRepository->delete($jobs);
    }
}
