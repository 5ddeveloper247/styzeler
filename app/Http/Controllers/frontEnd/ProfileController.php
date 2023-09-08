<?php

namespace App\Http\Controllers\frontEnd;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getProfileData()
    {
        $data = User::where('id', Auth::user()->id)->first();

        return response()->json(['data' => $data, 'status' => 200]);
    }
}
