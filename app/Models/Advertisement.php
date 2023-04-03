<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $guard = [];
    protected $timestamp = false;
    protected $fillable = [
        'job_listing_ad',
        'job_listing_ad_status',
        'company_listing_ad',
        'company_listing_ad_status',
        'created_at', 'updated_at'
    ];
}