<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowPosts extends Component
{
    public $msg;
    public function mount(){
        $this->msg = 'Hello World';
    }
    public function render()
    {
        return view('livewire.show-posts');
    }
}
