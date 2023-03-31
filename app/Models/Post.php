<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $guard = [];
    protected $timestamp = false;
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'view',
        'image',
        'created_by',
        'created_at',
        'updated_at'
    ];
}