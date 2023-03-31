<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WhyChoose extends Model
{
    use HasFactory, SoftDeletes;

    protected $guard = [];
    protected $timestamp = false;
    protected $fillable = ['title', 'icon', 'description', 'created_at', 'updated_at'];
}