<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jobs extends Model
{
    use HasFactory, SoftDeletes;

    protected $guard = [];
    protected $timestamp = false;
    protected $fillable = [
        'company_id',
        'title',
        'slug',
        'description',
        'responsibility',
        'skill',
        'education',
        'benefit',
        'deadline',
        'vacancy',
        'job_category_id',
        'job_location_id',
        'job_type_id',
        'job_experience_id',
        'job_gender_id',
        'job_salary_range_id',
        'map_code',
        'is_featured',
        'is_urgent',
        'created_at', 'updated_at'
    ];

    /**
     * Get the user that owns the Jobs
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'job_category_id');
    }
}