<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request){
        return view('addpost');
    }

    public function store(Request $request){

        $request->validate([
            "title" => ['required', 'min:3'],
            "content" => ['required', 'min:10'],
            "image_url" => ['required']
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image_url' => $request->image_url,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('home', auth()->user()->name);

    }

    public function show(Post $post){
        return view('showpost',[
            'post' => $post
        ]);
    }

    public function edit(Post $post){
        return view('editpost',[
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post){
       $request->validate([
        'title' => ["required", 'min:3'],
        'content' => ["required", 'min:10']
       ]);

       $newPost = Post::find($post->id);
       $newPost->title = $request->title;
       $newPost->content = $request->content;
       
       $newPost->save();

       return redirect()->route('post.show', $newPost->id);

    }

    public function destroy(Request $request, Post $post){
        $request->user()->posts()->where('id',$post->id)->delete();

        return back();
    }

}