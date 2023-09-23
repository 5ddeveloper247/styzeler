<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_apply extends Model
{
    use HasFactory;
    
    protected $table = 'job_apply';

    
    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
    public function jobRequest()
    {
    	return $this->belongsTo(Job_request::class, 'job_id');
    }
}
