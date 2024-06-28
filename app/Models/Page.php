<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $casts = [
        'title' => 'array',
        'seo_h1' => 'array',
        'seo_title' => 'array',
        'seo_description' => 'array',
        'description' => 'array',
    ];

}
