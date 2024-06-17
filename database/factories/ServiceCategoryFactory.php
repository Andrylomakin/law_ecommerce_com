<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Psy\Util\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceCategory>
 */
class ServiceCategoryFactory extends Factory
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
                'de' => $this->faker->word,
                'en' => $this->faker->word,
                'es' => $this->faker->word,
                'fr' => $this->faker->word,
                'in' => $this->faker->word,
                'it' => $this->faker->word,
                'nl' => $this->faker->word,
                'pl' => $this->faker->word,
                'tr' => $this->faker->word,
                'ru' => $this->faker->word,
            ],
            'slug' => \Illuminate\Support\Str::slug($this->faker->word)
        ];
    }
}
