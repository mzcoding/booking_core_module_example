<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Booking\Models\HuntingBooking;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class HunterBookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var HuntingBooking $this */
        return [
            'guide_id' => $this->guide_id,
            'tour_name' => $this->tour_name,
            'hunter_name' => $this->hunter_name,
            'date' => $this->date,
            'participants_count' => $this->participants_count,
        ];
    }
}
