<?php

declare(strict_types=1);

namespace Booking\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
*  @property string $name
 * @property int $experience_years
 * @property bool $is_active
 * */
final class Guide extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'experience_years',
        'is_active'
    ];

    protected $casts = [
        'experience_years' => 'int',
        'is_active' => 'bool'
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(HuntingBooking::class, 'guide_id');
    }
}
