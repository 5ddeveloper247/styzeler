<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function booked_user()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function cart_lines()
    {
        return $this->hasMany(Cart_line::class, 'cart_id', 'id');
    }

    public function userBookingSlots(): BelongsTo
    {
        return $this->belongsTo(BookingSlots::class, 'slot_id', 'id');
    }
}
