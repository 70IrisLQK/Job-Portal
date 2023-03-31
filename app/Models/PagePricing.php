<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PagePricing extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'page_pricing';
    protected $guard = [];
    protected $timestamp = false;
    protected $fillable = ['title', 'description', 'image', 'created_at', 'updated_at'];
}