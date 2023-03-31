<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageTerm extends Model
{
    use HasFactory;
    protected $table = 'page_terms';
    protected $guard = [];
    protected $timestamp = false;
    protected $fillable = ['title', 'description', 'image', 'created_at', 'updated_at'];
}