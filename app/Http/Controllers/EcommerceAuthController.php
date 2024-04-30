<?php

namespace App\Http\Controllers;

use Rules\Password;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Has;
use App\Mail\ForgotPasswordMail;
use Hash;
use Str;
use Mail;


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

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', 'min:8'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'codepostal' => ['required', 'string', 'max:5','min:5'],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->codepostal = $request->codepostal;
        $user->country = $request->country;
        $user->city = $request->city;


        $result = $user->save();
        if ($result) {
            return redirect()->route('Login');
        } else {
            return back()->with('fail', 'Something wrong!');
        }
    }

    public function handllogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('Home');
        }

        return back()->withInput()->withErrors(['email' => 'Invalid email or password']);
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Déconnexion de l'utilisateur
        $request->session()->forget('key'); // Supprimer les données de session spécifiques
        return redirect()->route('Login'); // Redirection vers la page de connexion
    }
    public function forgot()
    {
        return view('Ecommerce.forgot');
    }
    
    public function forgot_password(Request $request)
    
    {
        $user = User::where('email' , '=',$request->email)->first();
        if(!empty($user))
        {
            $user->remember_token = Str::random(40);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            

            return redirect()->back()->with('success', "please check your email and rest your password");
        }
        else
        {
            return redirect()->back()->with('error', "Email not found in system try again");
        }   
    }
   



}
