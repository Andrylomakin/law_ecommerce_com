<?php

namespace Database\Factories;

use App\Models\SeoLading;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SeoLading>
 */
class SeoLadingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
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
        ];
    }
}
