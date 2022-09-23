<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $posts = Post::where('user_id', auth()->user()->id)->get();
        return view('profile', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request){
        $request->request->add(["name" => Str::slug($request->name) ]);
        
        $request->validate([
            "name" => ['required','min:3', 'unique:users'],
        ]);

        if($request->image_url){
            $image = $request->file('image_url');

            $imageName = Str::uuid() . "." .$image->extension();

            $imageServer = Image::make($image);
            $imageServer->fit(1000,1000);

            $imagePath = public_path('uploads') . '/' . $imageName;
            $imageServer->save($imagePath);
        }

        $user = User::find(auth()->user()->id);

        $user->name = $request->name;
        $user->image_url = $imageName ?? '';

        $user->save();

        return back();

    }

    public function show(){
        return view('deleteprofile');
    }

    public function destroy(Request $request){

        $request->validate([
            'delete' => ['required','in:DELETE ACCOUNT']
        ]);

        $user = auth()->user();
        $user->delete();

        return redirect()->route('login');
    }
}