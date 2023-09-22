<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingSlots extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'start_time',
        'end_time'

    ];
}
