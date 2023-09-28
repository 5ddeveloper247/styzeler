<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
