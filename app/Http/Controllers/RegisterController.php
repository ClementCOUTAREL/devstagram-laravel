<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('register');
    }

    public function store(Request $request){
        $request->request->add(['name' => Str::slug($request->name)]);

        $request->validate( [
            'name' => ['required','unique:users', 'min:3'],
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required', 'confirmed' , 'min:8'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('home', auth()->user()->name);

    }
}