<?php

namespace App\Repositories;

use App\Http\Controllers\JobController;
use App\Models\JobLocation;


class JobLocationRepository {

    protected $model;

    public function __construct(JobLocation $model)
    {
        $this->model = $model;
    }
    public function exists($jobId, $locationId, $id) 
    {
        return $this->model->where('job_id', $jobId)
                           ->where('location_id', $locationId)
                           ->where('id', '!=', $id)
                           ->exists();
    }
}
