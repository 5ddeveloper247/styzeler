<?php

namespace App\Models;

use App\Models\Bookings;
use App\Models\Appointments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookingSlots extends Model
{
    use HasFactory;

    protected $fillable = [
        'bookings_id',
        'start_time',
        'end_time',
        'status',
        'slots_time',


    ];

    public function appointments()
    {
        return $this->hasMany(Appointments::class, 'booking_slots_id');
    }

    /**
     * Get all of the comments for the BookingSlots
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings(): HasOne
    {
        return $this->hasOne(Bookings::class, 'id', 'bookings_id');
    }
}
