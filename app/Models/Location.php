<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $primaryKey = 'location_id';

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['city', 'country', 'address'];

    // Definisi relasi many-to-many dengan model Job
    // public function jobs()
    // {
    //     return $this->belongsToMany(Job::class, 'job_location', 'location_id', 'job_id');
    // }

    // public function jobLocations()
    // {
    //     return $this->hasMany(JobLocation::class);
    // }

    public function job()
    {
        return $this->belongsToMany(Job::class, 'job_locations');
    }
}
