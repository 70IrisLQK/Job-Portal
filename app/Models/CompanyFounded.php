<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyFounded extends Model
{
    use HasFactory;
    protected $table = 'company_founded';
    protected $guard = [];
    protected $timestamp = false;
    protected $fillable = ['name', 'created_at', 'updated_at'];
}