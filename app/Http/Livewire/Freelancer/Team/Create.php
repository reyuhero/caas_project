<?php

namespace App\Http\Livewire\Freelancer\Team;

use App\Models\Category;
use App\Models\File;
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
    public $logo, $file;
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
        $this->validate([
            'logo.*' => 'image|max:1024', // 1MB Max
        ]);
        foreach ($this->logo as $key => $logo) {
            $this->logo[$key] = $logo->store('images');
        }
        $logo_url = reset($this->logo);
        $file = File::create();
        $file->name = $this->file['name'];
        $file->size = $this->file['size'];
        $file->mime = $this->file['ext'];
        $file->location = $logo_url;
        $file->save();

        $team = Team::create($this->form);
        $team->categories()->attach($categories_ids);
        $team->logo_id = $file->id;
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
    public function getFile($file)
    {
        $this->file['name'] = $file['name'];
        $this->file['size'] = $file['size'];
        $this->file['ext'] = $file['ext'];
    }
    public function render()
    {
        return view('livewire.freelancer.team.create')
        ->extends('layouts.freelancer')
        ->section('content');
    }
}
