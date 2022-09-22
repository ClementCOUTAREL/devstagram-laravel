<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store( User $user){
        $user->followers()->attach(auth()->user()->id);

        return back();

    }

    public function destroy(User $user){
        $user->followers()->detach(auth()->user()->id);

        return back();
    }

}