<?php

namespace App\Livewire\Post\View;

use Livewire\Component;
use App\Models\Post;

class Item extends Component
{

    public Post $post;

    public function render()  
    {
        $comments = $this->post->comments;
        return view('livewire.post.view.item', ['comments'=>$comments]);
    }
}
