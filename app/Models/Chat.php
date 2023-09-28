<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    
    protected $table = 'chat';

    public function chat_guest_user()
    {
    	return $this->belongsTo(Guest_user::class, 'guest_user_id');
    }

}
