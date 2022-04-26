<?php

namespace App\Http\Livewire\Freelancer\Project;

use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
    public $categories = [];
    public $selected_categories = [];
    public function mount()
    {
        $this->categories = Category::all();
    }
    public function add($item)
    {
        if(!in_array($item, $this->selected_categories))
            return array_unshift($this->selected_categories, $item);
    }
    public function remove($index)
    {
        unset($this->selected_categories[$index]);
    }
    public function render()
    {
        return view('livewire.freelancer.project.index')
            ->extends('layouts.master')
            ->section('content');
    }
}
