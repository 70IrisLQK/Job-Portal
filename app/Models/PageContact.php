<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageContact extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'page_contacts';
    protected $guard = [];
    protected $timestamp = false;
    protected $fillable = [
        'title',
        'seo_description',
        'seo_title',
        'map_code',
        'image',
        'created_at', 'updated_at'
    ];
}