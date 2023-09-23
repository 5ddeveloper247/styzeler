<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_request extends Model
{
    use HasFactory;
    
    protected $table = 'job_request';

    
    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
