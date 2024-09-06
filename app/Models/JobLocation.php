<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobLocation extends Model
{
    // Menentukan nama tabel jika berbeda
    //protected $table = 'job_location'; // Atau 'job_location' jika sesuai

    use HasFactory;

    protected $fillable = [
        'location_id',
        'job_id'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
    
}