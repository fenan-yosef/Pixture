<?php

namespace App\Livewire\Post\View;

use Livewire\Component;
use App\Models\Post;

class Item extends Component
{

    public Post $post;

    public function render()
    {
        return view('livewire.post.view.item');
    }
}
