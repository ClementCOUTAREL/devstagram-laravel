<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){

        $posts = Post::where('user_id', auth()->user()->id)->get();
        return view('profile', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request){
        dd($request);
    }
}