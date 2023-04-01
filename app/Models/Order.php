<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guard = [];
    protected $timestamp = false;
    protected $fillable = [
        'company_id',
        'package_id',
        'order_no',
        'paid_amount',
        'payment_method',
        'start_date',
        'expire_date',
        'currently_active',
        'created_at', 'updated_at'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}