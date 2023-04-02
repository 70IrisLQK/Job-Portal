<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateBookmark extends Model
{
    use HasFactory;
    protected $guard = [];
    protected $timestamp = false;
    protected $fillable = [
        'candidate_id',
        'job_id',

        'created_at', 'updated_at'
    ];

    /**
     * Get all of the comments for the CandidateBookmark
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function job()
    {
        return $this->belongsTo(Jobs::class, 'job_id');
    }
}