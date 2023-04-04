<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageBlog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'page_blogs';
    protected $guard = [];
    protected $timestamp = false;
    protected $fillable = [
        'title',
        'image',
        'seo_title',
        'seo_description',
        'created_at',
        'updated_at'
    ];
}