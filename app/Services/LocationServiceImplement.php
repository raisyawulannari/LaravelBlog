<?php

namespace App\Services;

use App\Models\Location;

class LocationServiceImplement implements LocationServiceInterface
{
    public function getAllLocations()
    {
        return Location::all();
    }

    public function getLocation($id)
    {
        return Location::find($id);
    }

    public function createLocation(array $data)
    {
        return Location::create($data);
    }

    public function updateLocation($id, array $data)
    {
        $location = Location::find($id);
        if ($location) {
            $location->update($data);
        }
        return $location;
    }

    public function deleteLocation($id)
    {
        Location::destroy($id);
    }
}
