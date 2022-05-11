<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Link extends Component
{
    public $href;
    public $name;
    public $icon;
    public function mount($href, $name, $icon)
    {
        $this->name = $name;
        $this->href = $href;
        $this->icon = $icon;
    }
    public function render()
    {
        return view('livewire.components.link');
    }
}
