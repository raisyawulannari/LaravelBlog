<?php

namespace App\Services;

use App\Models\Job;

interface JobServiceInterface
{
    public function getAllJobs(): array;
    public function getJob(int $id): ?Job;
    public function createJob(array $data): Job;
    public function updateJob(int $id, array $data): bool;
    public function deleteJob(int $id): bool;
}
