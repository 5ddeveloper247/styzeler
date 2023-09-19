<?php

namespace App\Models;

use App\Http\Traits\HasFactoryTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bookings extends Model
{
    use HasFactory, HasFactoryTrait;

    protected $fillable = [
        'status',
        'user_id',
        'date'

    ];

    // protected $casts = [
    //     'date' => 'json',

    // ];
}
