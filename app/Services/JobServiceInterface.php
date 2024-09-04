<?php

namespace App\Services;

use App\Models\Job;

interface JobServiceInterface
{
    public function createJob(array $data): Job;
    public function updateJob(Job $job, array $data): bool;
    public function deleteJob(Job $job): bool;
}
