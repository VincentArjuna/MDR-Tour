<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_number',
        'package_id',
        'status',
        'travel_date',
        'number_of_participants',
        'total_price',
        'paid_amount',
        'remaining_amount',
        'payment_status',
        'special_requests',
        'whatsapp_message',
        'notes',
        'confirmed_at',
        'cancelled_at',
        'cancellation_reason',
    ];

    protected $casts = [
        'travel_date' => 'date',
        'total_price' => 'decimal:2',
        'paid_amount' => 'decimal:2',
        'remaining_amount' => 'decimal:2',
        'confirmed_at' => 'datetime',
        'cancelled_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($booking) {
            $booking->booking_number = 'TRV-' . strtoupper(Str::random(8));
        });

        static::saving(function ($booking) {
            $booking->remaining_amount = $booking->total_price - $booking->paid_amount;
            
            if ($booking->paid_amount == 0) {
                $booking->payment_status = 'unpaid';
            } elseif ($booking->paid_amount < $booking->total_price) {
                $booking->payment_status = 'partial';
            } else {
                $booking->payment_status = 'paid';
            }
        });
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }


    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(Customer::class, 'booking_participants', 'booking_id', 'customer_id');
    }
}
