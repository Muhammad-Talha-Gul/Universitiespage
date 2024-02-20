<?php

namespace App\Http\Controllers\Auth\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function login(){
        return view('auth.consultant.consultant_login');
    }
}
