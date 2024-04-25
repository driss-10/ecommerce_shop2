<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EcommerceAuthController extends Controller
{
    public function Login()
    {
        return view('Ecommerce.Login');
    }
    public function Register()
    {
        return view('Ecommerce.Register');
    }
}
