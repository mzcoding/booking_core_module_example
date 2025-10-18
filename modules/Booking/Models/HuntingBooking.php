<?php

declare(strict_types=1);

namespace Booking\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $guide_id
 * @property string $tour_name
 * @property string $hunter_name
 * @property CarbonInterface $date
 * @property int $participants_count
 */
final class HuntingBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'guide_id',
        'tour_name',
        'hunter_name',
        'date',
        'participants_count'
    ];

    protected $casts = [
        'date' => 'date',
        'participants_count' => 'integer',
    ];

    protected $dateFormat = 'Y-m-d';

    public function guide(): BelongsTo
    {
        return $this->belongsTo(Guide::class);
    }
}
