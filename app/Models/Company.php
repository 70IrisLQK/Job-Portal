<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
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
        'company_name',
        'person_name',
        'username',
        'email',
        'password',
        'slug',
        'token',
        'logo',
        'phone',
        'address',
        'website',
        'banner',
        'company_location_id',
        'company_size_id',
        'company_founded_id',
        'company_industry_id',
        'description',
        'oh_mon',
        'oh_tue',
        'oh_wed',
        'oh_thu',
        'oh_fri',
        'oh_sat',
        'oh_sun',
        'map_code',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'status',
        'background',
        'created_at', 'updated_at'
    ];

    public function jobs()
    {
        return $this->hasMany(Jobs::class, 'company_id');
    }

    public function location()
    {
        return $this->belongsTo(CompanyLocation::class, 'company_location_id');
    }

    public function size()
    {
        return $this->belongsTo(CompanySize::class, 'company_size_id');
    }

    public function industry()
    {
        return $this->belongsTo(CompanyIndustry::class, 'company_industry_id');
    }

    public function founded()
    {
        return $this->belongsTo(CompanyFounded::class, 'company_founded_id');
    }
}