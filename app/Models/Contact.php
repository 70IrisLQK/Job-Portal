<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;
    protected $guard = [];
    protected $timestamp = false;
    protected $fillable = [
        'name', 'email', 'message', 'created_at', 'updated_at'
    ];
}