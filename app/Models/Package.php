<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'itinerary',
        'price',
        'duration_days',
        'destination',
        'inclusions',
        'exclusions',
        'featured_image',
        'gallery',
        'is_active',
        'max_participants',
        'available_from',
        'available_until',
    ];

    protected $casts = [
        'inclusions' => 'array',
        'exclusions' => 'array',
        'gallery' => 'array',
        'is_active' => 'boolean',
        'available_from' => 'date',
        'available_until' => 'date',
        'price' => 'decimal:2',
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
