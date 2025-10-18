<?php

declare(strict_types=1);

namespace Database\Factories\Booking\Models;

use Booking\Models\Guide;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Guide>
 */
final class GuideFactory extends Factory
{
    protected $model = Guide::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'experience_years' => mt_rand(1, 11),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
