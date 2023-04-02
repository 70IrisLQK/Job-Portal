<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateWorkExperience extends Model
{
    use HasFactory;
    protected $guard = [];
    protected $timestamp = false;
    protected $fillable = [
        'candidate_id',
        'company',
        'description',
        'start_date',
        'end_date',
        'created_at', 'updated_at'
    ];
}