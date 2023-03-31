<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomePage extends Model
{
    use HasFactory, SoftDeletes;
    protected $guard = [];
    protected $timestamp = false;
    protected $fillable =
    [
        'title',
        'short_title',
        'job_title',
        'job_category',
        'job_location',
        'search',
        'background',
        'status',
        'job_category_title',
        'job_category_short_title',
        'job_category_status',
        'why_choose_title',
        'why_choose_short_title',
        'why_choose_bg',
        'why_choose_status',
        'feature_job_title',
        'feature_job_short_title',
        'feature_job_status',
        'created_at',
        'updated_at'
    ];
}