<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\HunterBookRequest;
use App\Http\Resources\HunterBookResource;
use Booking\Services\HunterBookingService;
use Illuminate\Http\JsonResponse;
use Psr\Log\LoggerInterface;

final class HunterBookController extends Controller
{
    public function __construct(
        private readonly HunterBookingService $service,
        private readonly LoggerInterface $logger
    ) {
    }

    public function __invoke(HunterBookRequest $request): HunterBookResource|JsonResponse
    {
        try {
            $created = $this->service->create($request->validated());
            $this->logger->info('New book created');

            return new HunterBookResource($created);
        } catch (\Throwable $exception) {
            $this->logger->error('Book error', [
                'message' => $exception->getMessage(),
                'trace' => $exception->getTrace(),
           ]);

            return response()->json([
                'message' => $exception->getMessage(),
            ], 400);
        }
    }
}
