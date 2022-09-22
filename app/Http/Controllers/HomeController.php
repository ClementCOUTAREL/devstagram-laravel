<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

    public function home(){
        return redirect()->route('login');
    }

     public function index(User $user) {
        $posts = Post::where('user_id', auth()->user()->id)->get();
        
         return view('welcome', [
            'user' => $user,
            'posts' => $posts,
         ]);
     }    
}