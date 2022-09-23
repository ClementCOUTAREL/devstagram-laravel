<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PostDetails extends Component
{

    public $post;

    public function render()
    {
        return view('livewire.post-details');
    }
}