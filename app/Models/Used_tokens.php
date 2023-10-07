<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Used_tokens extends Model
{
    use HasFactory;
    
    protected $table = 'used_tokens';

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
    
}
