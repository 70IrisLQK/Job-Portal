<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateEducation extends Model
{
    use HasFactory;
    protected $guard = [];
    protected $timestamp = false;
    protected $fillable = [
        'level',
        'institute',
        'degree',
        'passing_year',
        'candidate_id',
        'created_at', 'updated_at'
    ];
}