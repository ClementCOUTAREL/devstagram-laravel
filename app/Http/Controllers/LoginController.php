<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function store(Request $request){
        $request->validate([
            'email' => ["required", "email"],
            'password' => ["required", "min:8"],
        ]);

        if(!auth()->attempt($request->only('email','password'), $request->remember)){
            return back()->with('message','Incorrect credentials provided, please try again');
        }
        
        return redirect()->route('home', auth()->user()->name);
    }
}