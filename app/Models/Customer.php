<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'whatsapp_number',
        'address',
        'city',
        'country',
        'date_of_birth',
        'gender',
        'emergency_contact',
        'special_requirements',
        'notes',
    ];

    protected $casts = [
        'emergency_contact' => 'array',
        'date_of_birth' => 'date',
    ];

    public function bookings(): BelongsToMany
    {
        return $this->belongsToMany(Booking::class, 'booking_participants', 'customer_id', 'booking_id');
    }

    public function testimonies(): HasMany
    {
        return $this->hasMany(Testimony::class);
    }
}
