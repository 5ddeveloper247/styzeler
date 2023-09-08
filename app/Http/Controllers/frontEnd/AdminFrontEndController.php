<?php

namespace App\Http\Controllers\adminFrontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminFrontEndController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function forgetPassword()
    {
        return view('auth.forgetPassword');
    }

   
}
