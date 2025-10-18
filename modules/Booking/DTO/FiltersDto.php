<?php

declare(strict_types=1);

namespace Booking\DTO;

final readonly class FiltersDto
{
    public function __construct(
        public ?int $min_experience = null,
    ) {
    }
}
