<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /* public function index(){
         if (!auth()->check()) {
             return redirect()->route('Login');
        }
         $user = Auth::user();
        return view('profile.Profile',compact('user'));
    }*/
    
    
    public function edit(){
        if (!auth()->check()) {
            return redirect('Login');
        }
        $user = Auth::user();
        return view('profile.edit',compact('user'));
    }
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'codepostal' => 'required|max:5 |min:5',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',

        ]);






        $user->update([
            $user->name = $request->name,
            $user->lastname = $request->lastname,
            $user->email = $request->email,
            $user->address = $request->address,
            $user->phone = $request->phone,
            $user->codepostal = $request->codepostal,
            $user->country = $request->country,
            $user->city = $request->city,
        ]);

        return redirect()->back();
    }

}
