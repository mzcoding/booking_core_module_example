<?php

declare(strict_types=1);

namespace Booking\Services;

use Booking\DTO\FiltersDto;
use Booking\Models\Guide;
use Illuminate\Database\Eloquent\Builder;

final readonly class GuideService
{
    public function listGuides(FiltersDto $dto): Builder
    {
        $query =  Guide::query()
            ->select(['id', 'name', 'experience_years', 'is_active']);
        if ($dto->min_experience) {
            return $query->where('experience_years', '>=', $dto->min_experience);
        }

        return $query;
    }
}
