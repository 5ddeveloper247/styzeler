<?php

namespace App\Models;

use App\Models\Appointments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookingSlots extends Model
{
    use HasFactory;

    protected $fillable = [
        'bookings_id',
        'start_time',
        'end_time'

    ];

    public function appointments()
    {
        return $this->hasMany(Appointments::class, 'booking_slots_id');
    }
}
