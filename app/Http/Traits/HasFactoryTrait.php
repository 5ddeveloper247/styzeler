<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Auth;

trait HasFactoryTrait
{
    public function scopeUser($query)
    {
        return $query->where('user_id', Auth::user()->id);
    }
    public function scopeIsNotCancelled($query)
    {
        return $query->where('status', '!=', 'Cancel');
    }
}
