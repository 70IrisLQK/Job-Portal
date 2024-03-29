<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateApply extends Model
{
    use HasFactory;
    protected $guard = [];
    protected $timestamp = false;
    protected $fillable = [
        'candidate_id',
        'job_id',
        'cover_letter',
        'status',
        'company_id',
        'created_at', 'updated_at'
    ];

    public function job()
    {
        return $this->belongsTo(Jobs::class);
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}