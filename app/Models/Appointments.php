<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Appointments extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_slots_id', 'booking_user_id'
    ];

    /**
     * Get the user associated with the Appointments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userAppointment(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'booking_user_id');
    }
    public function userBookingSlots(): BelongsTo
    {
        return $this->belongsTo(BookingSlots::class, 'booking_slots_id', 'id');
    }
    public function clientUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'booking_user_id', 'id')->where('id', Auth::id());
    }
    public function adminClientUser(): BelongsTo
    {
    	return $this->belongsTo(User::class, 'booking_user_id', 'id');
    }
}
