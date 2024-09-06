<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    protected $fillable = [
        'activity_name',
        'platform',
        'description',
        'deadline',
        'created_at',
        'updated_at',
        'post_id',
    ];

    protected $attributes = [
        'platform' => 'default_value',
        'activity_name' => 'default_value',
        'description' => 'default_value',
    ];

    protected $casts = [
        'deadline' => 'datetime',
    ];

    // Relasi one-to-many dengan Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function location()
    {
        return $this->belongsToMany(Location::class, 'job_locations', 'job_id', 'location_id');
    }

    public function jobLocations()
    {
        return $this->hasMany(JobLocation::class);
    }

}
