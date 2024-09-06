<?php

namespace App\Services;

use App\Models\Location;
use App\Repositories\LocationRepository;

class LocationService
{
    protected $repository;

    public function __construct(LocationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllLocations()
    {
        return $this->repository->all();
    }

    public function getLocation($id)
    {
        return Location::find($id);
    }


    // public function getLocation($id)
    // {
    //     return $this->repository->find($id);
    // }

    public function createLocation(array $data)
    {
        return $this->repository->create($data);
    }

    public function updateLocation($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deleteLocation($id)
    {
        return $this->repository->delete($id);
    }
}
