<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

class ProfileImage extends Component
{
    public $url;

    public function render()
    {
        return view('livewire.profile.profile-image');
    }
}