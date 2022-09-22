<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    public function store(Request $request){
        $image = $request->file('file');

        $imageName = Str::uuid() . "." .$image->extension();

        $imageServer = Image::make($image);
        $imageServer->fit(1000,1000);

        $imagePath = public_path('uploads') . '/' . $imageName;
        $imageServer->save($imagePath);

        return response()->json(['image' => $imageName]);
    }

    public function update(Request $request, User $user){
        $image = $request->file('file');

        dd($request);

        $imageName = Str::uuid() . "." .$image->extension();

        $imageServer = Image::make($image);
        $imageServer->fit(1000,1000);

        $imagePath = public_path('uploads') . '/' . $imageName;
        $imageServer->save($imagePath);

        $user = User::find($request->user_id);
        $user->image_url = $imageName;
        $user->save();

        return response()->json(['image' => $imageName]);
    }
}