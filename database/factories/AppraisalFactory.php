<?php

namespace Database\Factories;

use App\Models\Appraisal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appraisal>
 */
class AppraisalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'preview' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'photo' => $this->faker->imageUrl(),
            'rating' => '5'
        ];
    }
}
