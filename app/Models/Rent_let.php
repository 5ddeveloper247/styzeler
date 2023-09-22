<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent_let extends Model
{
    use HasFactory;
    
    protected $table = 'rent_let';

    
    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
