<?php

namespace App\Http\Livewire\Follow;

use Livewire\Component;

class FollowCard extends Component
{

    public $follow;

    public function render()
    {
        return view('livewire.follow.follow-card');
    }
}