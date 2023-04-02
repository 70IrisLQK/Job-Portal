<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateAward extends Model
{
    use HasFactory;
    protected $guard = [];
    protected $timestamp = false;
    protected $fillable = [
        'candidate_id',
        'title',
        'description',
        'date',
        'created_at', 'updated_at'
    ];
}