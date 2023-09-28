<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    
    protected $table = 'cart';

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function cart_lines()
    {
    	return $this->hasMany(Cart_line::class, 'cart_id');
    }
}
