<?php

namespace App\Models;

use App\Models\BookingSlots;
use App\Http\Traits\HasFactoryTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bookings extends Model
{
    use HasFactory, HasFactoryTrait;

    protected $fillable = [
        'status',
        'user_id',
        'date'

    ];

    public function bookingTimeSlots()
    {
        return $this->hasMany(BookingSlots::class, 'booking_id');
    }

    /**
     * Get the user that owns the Bookings
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->where('id', Auth::id());
    }
}
