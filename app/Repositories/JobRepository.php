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

    public function all()
    {
        return $this->model->all();
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
        $job = $this->find($id);
        $job->update($data);
        return $job;
    }

    public function delete($id)
    {
        $job = $this->find($id);
        $job->delete();
        return true;
    }
}
