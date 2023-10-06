<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat_reply extends Model
{
    use HasFactory;

    protected $table = 'chat_reply';


    public function guest_user()
    {
        return $this->belongsTo(Chat::class, 'id');
    }
}