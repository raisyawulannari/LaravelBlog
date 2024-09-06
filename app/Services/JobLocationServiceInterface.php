<?php

namespace App\Services;

interface JobLocationServiceInterface
{
    public function getAll();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function exists($cakeId, $varianId, $id);
}
