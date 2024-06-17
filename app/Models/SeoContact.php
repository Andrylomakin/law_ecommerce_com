<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoContact extends Model
{
    use HasFactory;

    protected $guarded = false;

    protected $casts = [
        'seo_title' => 'array',
        'seo_description' => 'array',
        'seo_text' => 'array',
    ];
}
