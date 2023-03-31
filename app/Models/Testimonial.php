<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $guard = [];
    protected $timestamp = false;
    protected $fillable = [
        'name', 'image',
        'comment', 'description',
        'created_at', 'updated_at'
    ];
}