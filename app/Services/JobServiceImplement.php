<?php

namespace App\Services;

use App\Models\Job;
use App\Repositories\JobRepository;

class JobServiceImplement implements JobServiceInterface
{
    protected $jobRepository;

    public function __construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    public function createJob(array $data): Job
    {
        return $this->jobRepository->create($data);
    }

    public function updateJob(Job $jobs, array $data): bool
    {
        return $this->jobRepository->update($jobs, $data);
    }

    public function deleteJob(Job $jobs): bool
    {
        return $this->jobRepository->delete($jobs);
    }
}
