<?php

declare(strict_types=1);

namespace Database\Factories\Booking\Models;

use Booking\Models\HuntingBooking;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<HuntingBooking>
 */
final class HuntingBookingFactory extends Factory
{
    protected $model = HuntingBooking::class;
    public function definition(): array
    {
        return [
            'guide_id' => new GuideFactory(),
            'tour_name' => $this->faker->colorName(),
            'hunter_name' => $this->faker->name(),
            'date' => Carbon::now(),
            'participants_count' => $this->faker->numberBetween(1, 15),
        ];
    }
}
