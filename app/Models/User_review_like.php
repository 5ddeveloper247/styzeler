<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_review_like extends Model
{
    use HasFactory;
    
    protected $table = 'user_review_like';

    
    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
    
    public function freelancer()
    {
    	return $this->belongsTo(User::class, 'freelancer_id');
    }
}
