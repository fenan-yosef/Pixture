<?php

namespace App\Livewire\Post\View;

use App\Models\Comment;
use Livewire\Component;
use App\Models\Post;

class Item extends Component
{

    public Post $post;


    public $body;
    public $parent_id=null;

    function addComment() {
        $this->validate(['body'=>'required']);

        #create comment 
        Comment::create([
            'body'=>$this->body,
            'parent_id'=>$this->parent_id,
            'commentable_id'=>$this->post->id,
            'commentable_type'=>Post::class,
            'user_id'=>auth()->id(),

        ]);

        $this->reset('body');


    }

    public function render()  
    {
        $comments = $this->post->comments()->whereDoesntHave('parent')->get();
        return view('livewire.post.view.item', ['comments'=>$comments]);
    }
}
