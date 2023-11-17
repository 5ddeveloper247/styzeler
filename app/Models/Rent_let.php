<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent_let extends Model
{
    use HasFactory;

    protected $table = 'rent_let';
    protected $fillable = [
        'salon_name', 'salon_address', 'country', 'county', 'post_code', 'phone', 'space_description', 'category', 'rent_let_category', 'rent_let_type', 'hourly_rent', 'daily_rent', 'weekly_rent', 'monthly_rent', 'image1', 'image2', 'image3', 'status', 'date', 'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
