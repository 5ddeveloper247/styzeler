<?php

namespace App\Models;

use App\Models\BookingSlots;
use App\Http\Traits\HasFactoryTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Bookings extends Model
{
    use HasFactory, HasFactoryTrait;

    protected $fillable = [
        'status',
        'user_id',
        'date'

    ];

    // Define the relationship with BookingSlots that don't have appointments
    public function bookingTimeSlots()
    {
        return $this->hasMany(BookingSlots::class, 'bookings_id');
    }
    /**
     * Get all of the comments for the Bookings
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function appointment_s(): HasManyThrough
    {
        return $this->hasManyThrough(Appointments::class, BookingSlots::class);
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
    public function FreelancerUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
