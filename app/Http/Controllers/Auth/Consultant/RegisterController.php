<?php

namespace App\Http\Controllers\Auth\Consultant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function register(){
        return view('auth.consultant.consultant_register');
    }
}
