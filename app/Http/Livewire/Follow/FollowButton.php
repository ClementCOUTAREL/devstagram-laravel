<?php

namespace App\Http\Livewire\Follow;

use Livewire\Component;

class FollowButton extends Component
{

    public $user;
    public $isFollowed;

    public function mount()
    {
        $this->isFollowed = $this->user->followed($this->user);
    }

    public function follow()
    {
        $this->user->followers()->attach(auth()->user()->id);
        $this->isFollowed = true;
    }

    public function destroy()
    {
        $this->user->followers()->detach(auth()->user()->id);
        $this->isFollowed = false;
    }

    public function render()
    {
        return view('livewire.follow.follow-button');
    }
}