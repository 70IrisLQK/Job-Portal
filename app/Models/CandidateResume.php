<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateResume extends Model
{
    use HasFactory;
    protected $guard = [];
    protected $timestamp = false;
    protected $fillable = [
        'file',
        'candidate_id',
        'name',
        'created_at', 'updated_at'
    ];
}