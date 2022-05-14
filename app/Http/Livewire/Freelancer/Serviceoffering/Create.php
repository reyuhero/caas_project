<?php

namespace App\Http\Livewire\Freelancer\Serviceoffering;

use App\Models\Category;
use App\Models\ServiceOffering;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    // form
    public $form = [
        'title',
        'description',
        'pricing',
        'timeline',
    ];
    public $categories = [];
    public $teamId;
    public $selected_categories = [];
    public $photos = [];
    public $photo = '';
    public $link;
    public $links = [];
    public $members = [];
    public $selected_members = [];
    public function mount($teamId)
    {
        $this->members = User::all();
        $this->categories = Category::all();
        $this->teamId = $teamId;

    }
    public function submit()
    {
        $this->validate([
            'photos.*' => 'image|max:1024', // 1MB Max
        ]);
        foreach ($this->photos as $key => $photo) {
            $this->photos[$key] = $photo->store('photos');
        }
        $this->photos = json_encode($this->photos);
        $serviceOffering = ServiceOffering::create($this->form);
        $categories_ids = array_map( function($item) {
            return $item['id'];
        }, $this->selected_categories);
        $serviceOffering->categories()->attach($categories_ids);
        $serviceOffering->links = $this->links;
        $serviceOffering->photos = $this->photos;
        $serviceOffering->members = $this->selected_members;
        $serviceOffering->save();
        return redirect()->route('freelancer.team',);
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
    public function removeLink($item)
    {
        unset($this->links[$item]);
    }
    public function addLink()
    {
        if(!in_array($this->link, $this->links))
            array_unshift($this->links, $this->link);
        $this->link = '';
    }
    public function render()
    {
        return view('livewire.freelancer.serviceoffering.create')
        ->extends('layouts.freelancer')
        ->section('content');
    }
}
