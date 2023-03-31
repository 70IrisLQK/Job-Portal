<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory, SoftDeletes;
    protected $guard = [];
    protected $timestamp = false;
    protected $fillable = [
        'name',
        'price',
        'days',
        'display_time',
        'total_allowed_job',
        'total_allowed_featured_jobs',
        'total_allowed_photos',
        'total_allowed_videos',
    ];
}