<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Home extends Component
{

    public $user;

    #[On('closeModal')]
    function reverUrl()
    {
        $this->js("history.replaceState({},'','/')");
    }


    function toggleFollow()
    {
        abort_unless(auth()->check(), 401);

        auth()->user()->toggleFollow($this->user);

        #send notication if is following
        if(auth()->user()->isFollowing($this->user)){

            $this->user->notify(new NewFollowerNotification(auth()->user()));
        }
    }    

    

    function mount($user)
    {
        $this->user = User::whereUsername($user)->withCount(['followers', 'followings', 'posts'])->firstOrFail();
    }
    public function render()
    {
        $this->user = User::whereUsername($this->user->username)->withCount(['followers', 'followings', 'posts'])->firstOrFail();

        $posts = $this->user->posts()->where('type', 'post')->get();

        return view('livewire.profile.home', data: ['posts' => $posts]);
    }
}

