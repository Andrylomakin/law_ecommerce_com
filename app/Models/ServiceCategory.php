<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $guarded = false;

    protected $casts = [
        'name' => 'array',
        'seo_title' => 'array',
        'seo_description' => 'array',
        'seo_text' => 'array',
    ];

    public function service(): HasMany
    {
        return $this->hasMany(Service::class);
    }
}
