<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;

    protected $guarded = false;

    protected $casts = [
        'name' => 'array',
        'preview_name' => 'array',
        'description' => 'array',
        'seo_title' => 'array',
        'seo_description' => 'array',
        'seo_text' => 'array',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function rating()
    {
        $percentage = $this->rating;

        $maxRating = 5;
        $rating = ($percentage / 100) * $maxRating;

        // Форматируем оценку с точностью до одного десятичного знака и меняем точку на запятую
        return str_replace('.', ',', number_format($rating, 1));
    }

}
