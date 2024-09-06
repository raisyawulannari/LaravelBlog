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

    public function getAllJobs(): array
    {
        // Mengembalikan array dari semua pekerjaan
        return $this->jobRepository->all()->toArray();
    }

    public function getJob(int $id): ?Job
    {
        return $this->jobRepository->find($id);
    }

    public function createJob(array $data): Job
    {
        return $this->jobRepository->create($data);
    }

    public function updateJob(int $id, array $data): bool
    {
        $job = $this->jobRepository->find($id);

        if (!$job) {
            return false;
        }

        return $this->jobRepository->update($job, $data);
    }

    public function deleteJob(int $id): bool
    {
        $job = $this->jobRepository->find($id);

        if (!$job) {
            return false;
        }

        return $this->jobRepository->delete($job);
    }
}
