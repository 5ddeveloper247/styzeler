<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Auth;

trait HasFactoryTrait
{
    public function scopeUser($query)
    {
        return $query->where('user_id', Auth::id());
    }

    public function scopeFreelancerUser($query, $id)
    {
        return $query->where('user_id', $id);
    }

    public function scopeIsNotCancelled($query)
    {
        return $query->where('status', '!=', 'Cancel');
    }
}
