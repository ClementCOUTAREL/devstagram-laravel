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
        $posts = Post::where('user_id', $user->id)->get();

        $ids = auth()->user()->followings->pluck('id')->toArray();
        $followedPosts = Post::whereIn('user_id', $ids)->get();
        
         return view('welcome', [
            'user' => $user,
            'posts' => $posts,
            'followed_posts' => $followedPosts
         ]);
     }    
}