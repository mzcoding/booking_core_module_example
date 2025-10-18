<?php

declare(strict_types=1);

namespace Booking\Services;

use Booking\Models\HuntingBooking;
use Illuminate\Database\Eloquent\Builder;

final readonly class HunterBookingService
{
    /**
     * @throws \Exception
     */
    public function create(array $data): HuntingBooking
    {
        $isAvailableDateBookExistsOrGuideNotActive = HuntingBooking::query()
            ->join('guides', 'guides.id', '=', 'hunting_bookings.guide_id')
            ->where('hunting_bookings.guide_id', $data['guide_id'])
            ->where(function (Builder $query) use($data) {
                $query
                    ->where('hunting_bookings.date', $data['date'])
                    ->orWhere('guides.is_active', false);
            })
            ->exists();

        if ($isAvailableDateBookExistsOrGuideNotActive) {
            throw new \Exception(__('Дата бронирования для этого гида уже занята или гид не активен'));
        }

        return HuntingBooking::query()->create($data);
    }
}
