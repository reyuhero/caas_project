<?php

namespace App\Http\Livewire\Freelancer\Team;

use App\Models\Category;
use App\Models\Team;
use Livewire\Component;
use Livewire\WithFileUploads;
class Create extends Component
{
    use WithFileUploads;
    public $form = [
        'name' => '',
        'url' => '',
        'tagline' => '',
        'description' => '',
        'service_offering' => ''
    ];
    public $logo = '';
    public $categories = [];
    public $selected_categories = [];
    public $selected_user = [];
    public $users = [];
    public $portfolios = [];

    public function submit()
    {
        $categories_ids = array_map( function($item) {
            return $item['id'];
        }, $this->selected_categories);
        $team = Team::create($this->form);
        $team->categories()->attach($categories_ids);
        $team->save();
        return redirect()->route('freelancer.team');
    }
    public function mount()
    {
        $this->categories = Category::all();
    }
    public function addToCategories($item)
    {
        if(!in_array($item, $this->selected_categories))
            return array_unshift($this->selected_categories, $item);
    }
    public function removeCategory($key)
    {
        unset($this->selected_categories[$key]);
    }
    public function render()
    {
        return view('livewire.freelancer.team.create')
        ->extends('layouts.freelancer')
        ->section('content');
    }
}
