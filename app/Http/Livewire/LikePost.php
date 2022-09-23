<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{

    public $post;
    public $isLiked;

    public function mount($post)
    {
        $this->isLiked = $post->isLiked();
    }

    public function like()
    {
        if($this->isLiked){
            $this->post->likes()->where('post_id', $this->post->id)->delete();
            $this->isLiked = false;
        }else{
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isLiked = true;
        };
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}