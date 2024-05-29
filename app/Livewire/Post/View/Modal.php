<?php

namespace App\Livewire\Post\View;

use LivewireUI\Modal\ModalComponent;
use App\Models\Post;

class Modal extends ModalComponent
{

    public $post;

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }

    function mount() {

        $this->post= Post::findOrFail($this->post);

        #get url
        $url= url('post/'.$this->post->id);

        #push state using new livewwire v3 js helper
        $this->js("history.pushState({},'','{$url}')");

    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public function render()
    {
        return <<<'BLADE'

        <main class="bg-white  h-[calc(100vh_-_3.5rem)]  md:h-[calc(100vh_-_5rem)] flex flex-col border gap-y-4 px-5">

            <header class="w-full py-2">

                <div class="flex justify-end">

                <button wire:click="dispatch('closeModal')" type="button" class="xl font-bold">X</button>

                </div>

            </header>

        </main>
        BLADE;
    }
}
