<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Candidate extends Authenticatable
{
    use HasFactory, SoftDeletes, HasApiTokens;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $guard = [];
    protected $timestamp = false;
    protected $fillable = [
        'name',
        'description',
        'username',
        'email',
        'password',
        'token',
        'image',
        'bio',
        'phone',
        'address',
        'country',
        'state',
        'city',
        'zip_code',
        'gender',
        'marital_status',
        'date_of_birth',
        'website',
        'status',
        'created_at',
        'updated_at'
    ];
}