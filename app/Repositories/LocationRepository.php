<?php

namespace App\Repositories;

use App\Models\Location;

class LocationRepository
{
    public function all()
    {
        return Location::all();
    }

    public function find($id)
    {
        return Location::find($id);
    }

    // public function find($id)
    // {
    //     return $this->model->findOrFail($id);
    // }

    public function create(array $data)
    {
        return Location::create($data);
    }

    public function update($id, array $data)
    {
        $location = $this->find($id);
        if ($location) {
            $location->update($data);
            return $location;
        }
        return null;
    }

    public function delete($id)
    {
        $location = $this->find($id);
        if ($location) {
            $location->delete();
            return true;
        }
        return false;
    }
}
