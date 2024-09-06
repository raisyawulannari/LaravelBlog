<?php

namespace App\Services;

interface LocationServiceInterface
{
    public function getAllLocations();
    public function getLocation($id);
    public function createLocation(array $data);
    public function updateLocation($id, array $data);
    public function deleteLocation($id);
}
