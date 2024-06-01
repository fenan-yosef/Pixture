<?php

namespace App\Livewire\Post;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class Item extends Component
{
    public $post;
    
    public $body;
    
    
    function addComment() {
        
        $this->validate(['body'=>'required']);

        #create comment 
        Comment::create([
            'body'=>$this->body,
            'commentable_id'=>$this->post->id,
            'commentable_type'=>Post::class,
            'user_id'=>auth()->id(),

        ]);

        $this->reset('body');


    }


    public function render()
    {
        return view('livewire.post.item');
    }
}
