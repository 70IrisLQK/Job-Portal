<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherItems extends Model
{
    use HasFactory;

    protected $table = 'other_items';
    protected $guard = [];
    protected $timestamp = false;
    protected $fillable = [
        'login_page_heading',
        'login_page_title',
        'login_page_seo_description',
        'register_page_heading',
        'register_page_title',
        'register_page_seo_description',
        'forget_password_page_heading',
        'forget_password_page_title',
        'forget_password_page_seo_description',
    ];
}