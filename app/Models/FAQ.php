<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;

    protected $table = 'faqs';
    protected $guard = [];
    protected $timestamp = false;
    protected $fillable = ['question', 'answer', 'created_at', 'updated_at'];
}