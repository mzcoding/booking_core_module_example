<?php

declare(strict_types=1);

namespace Feature;

use Booking\Models\Guide;
use Booking\Models\HuntingBooking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class BookingApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_a_new_booking_with_available_date_and_active_guide_is_successfully(): void
    {
        /** @var Guide $guide */
        $guide = Guide::factory()->create([
            'is_active' => true,
        ]);
        HuntingBooking::factory()->create([
            'guide_id' => $guide->id,
            'date' => '2025-10-18',
        ]);

        $this->post('/api/bookings', [
            'guide_id' => $guide->id,
            'tour_name' => 'Some tour',
            'hunter_name' => 'Some hunter',
            'date' => '2025-10-19',
            'participants_count' => 10,
        ]);

        $this->assertDatabaseHas('hunting_bookings', [
            'guide_id' => $guide->id,
            'date' => '2025-10-19',
        ])->assertDatabaseCount('hunting_bookings', 2);
    }

    public function test_create_a_new_booking_with_available_date_and_not_active_guide_is_successfully(): void
    {
        /** @var Guide $guide */
        $guide = Guide::factory()->create([
            'is_active' => false,
        ]);
        HuntingBooking::factory()->create([
            'guide_id' => $guide->id,
            'date' => '2025-10-18',
        ]);

        $this->post('/api/bookings', [
            'guide_id' => $guide->id,
            'tour_name' => 'Some tour',
            'hunter_name' => 'Some hunter',
            'date' => '2025-10-19',
            'participants_count' => 10,
        ]);

        $this->assertDatabaseHas('hunting_bookings', [
            'guide_id' => $guide->id,
            'date' => '2025-10-18',
        ])->assertDatabaseCount('hunting_bookings', 1);
    }

    public function test_create_a_new_booking_with_available_date_failed(): void
    {
        /** @var Guide $guide */
        $guide = Guide::factory()->create();
        HuntingBooking::factory()->create([
            'guide_id' => $guide->id,
            'date' => '2025-10-18',
        ]);

        $this->post('/api/bookings', [
            'guide_id' => $guide->id,
            'tour_name' => 'Some tour',
            'hunter_name' => 'Some hunter',
            'date' => '2025-10-18',
            'participants_count' => 10,
        ]);

        $this->assertDatabaseCount('hunting_bookings', 1);
    }

    public function test_check_participants_count_less_ten_validation_success(): void
    {
        /** @var Guide $guide */
        $guide = Guide::factory()->create();
        $response = $this->post('/api/bookings', [
            'guide_id' => $guide->id,
            'tour_name' => 'Some tour',
            'hunter_name' => 'Some hunter',
            'date' => '2025-10-18',
            'participants_count' => 8,
        ]);

        $response->assertStatus(302);
    }
}
