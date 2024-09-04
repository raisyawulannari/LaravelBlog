<?php

namespace App\Repositories;

use App\Models\Job;


class JobRepository
{
    protected $model;

    public function __construct(Job $model)
    {
        $this->model = $model;
    }

    public function getAllPaginated($perPage = 10)
    {
        return $this->model->with('chef')->paginate($perPage);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $jobs = $this->find($id);
        $jobs->update($data);
        return $jobs;
    }

    public function delete($id)
    {
        $jobs = $this->find($id);
        $jobs->delete();
        return $jobs;
    }
}
