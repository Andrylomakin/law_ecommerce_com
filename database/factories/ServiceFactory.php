<?php

namespace Database\Factories;

use App\Models\ServiceCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => [
                'de' => $this->faker->sentence,
                'en' => $this->faker->sentence,
                'es' => $this->faker->sentence,
                'fr' => $this->faker->sentence,
                'in' => $this->faker->sentence,
                'it' => $this->faker->sentence,
                'nl' => $this->faker->sentence,
                'pl' => $this->faker->sentence,
                'tr' => $this->faker->sentence,
                'ru' => $this->faker->sentence,
            ],
            'preview_name' => [
                'de' => $this->faker->sentence,
                'en' => $this->faker->sentence,
                'es' => $this->faker->sentence,
                'fr' => $this->faker->sentence,
                'in' => $this->faker->sentence,
                'it' => $this->faker->sentence,
                'nl' => $this->faker->sentence,
                'pl' => $this->faker->sentence,
                'tr' => $this->faker->sentence,
                'ru' => $this->faker->sentence,
            ],
            'description' => [
                'de' => $this->faker->paragraph,
                'en' => $this->faker->paragraph,
                'es' => $this->faker->paragraph,
                'fr' => $this->faker->paragraph,
                'in' => $this->faker->paragraph,
                'it' => $this->faker->paragraph,
                'nl' => $this->faker->paragraph,
                'pl' => $this->faker->paragraph,
                'tr' => $this->faker->paragraph,
                'ru' => $this->faker->paragraph,
            ],
            'seo_title' => [
                'de' => $this->faker->sentence,
                'en' => $this->faker->sentence,
                'es' => $this->faker->sentence,
                'fr' => $this->faker->sentence,
                'in' => $this->faker->sentence,
                'it' => $this->faker->sentence,
                'nl' => $this->faker->sentence,
                'pl' => $this->faker->sentence,
                'tr' => $this->faker->sentence,
                'ru' => $this->faker->sentence,
            ],
            'seo_description' => [
                'de' => $this->faker->sentence,
                'en' => $this->faker->sentence,
                'es' => $this->faker->sentence,
                'fr' => $this->faker->sentence,
                'in' => $this->faker->sentence,
                'it' => $this->faker->sentence,
                'nl' => $this->faker->sentence,
                'pl' => $this->faker->sentence,
                'tr' => $this->faker->sentence,
                'ru' => $this->faker->sentence,
            ],
            'seo_text' => [
                'de' => $this->faker->sentence,
                'en' => $this->faker->sentence,
                'es' => $this->faker->sentence,
                'fr' => $this->faker->sentence,
                'in' => $this->faker->sentence,
                'it' => $this->faker->sentence,
                'nl' => $this->faker->sentence,
                'pl' => $this->faker->sentence,
                'tr' => $this->faker->sentence,
                'ru' => $this->faker->sentence,
            ],
            'price' => '100',
            'photo' => $this->faker->imageUrl(),
            'icon' => $this->faker->imageUrl(),
            'category_id' => ServiceCategory::inRandomOrder()->first()->id,
            'slug' => \Illuminate\Support\Str::slug($this->faker->word)
        ];
    }
}
