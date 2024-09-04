<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    protected $fillable = [
        'platform',
        'description',
        'deadline',
        'post_id',
    ];

    protected $attributes = [
        'platform' => 'default_value',
        'description' => 'default_value',
    ];

    protected $casts = [
        'deadline' => 'datetime',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
