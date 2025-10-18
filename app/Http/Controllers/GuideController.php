<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\GuideResource;
use Booking\DTO\FiltersDto;
use Booking\Services\GuideService;
use Illuminate\Http\Request;

final class GuideController extends Controller
{
    public function __construct(private readonly GuideService $service)
    {
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): GuideResource
    {
        $builder = $this->service->listGuides(
            new FiltersDto((int) $request->get('min_experience'))
        );

        return new GuideResource($builder->paginate());
    }
}
