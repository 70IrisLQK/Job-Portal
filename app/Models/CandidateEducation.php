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
        'skill_name',
        'percentage',
        'candidate_id',
        'created_at', 'updated_at'
    ];
}