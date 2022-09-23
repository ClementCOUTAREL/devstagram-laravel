<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PostEditButtons extends Component
{

    public $post;

    public function destroy()
    {
        $this->post->delete();
    }

    public function render()
    {
        return view('livewire.post-edit-buttons');
    }
}