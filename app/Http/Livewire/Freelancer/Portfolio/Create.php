<?php

namespace App\Http\Livewire\Freelancer\Portfolio;

use App\Models\Portfolio;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
class Create extends Component
{
    use WithFileUploads;
    public $form = [
        'title' => '',
        'description' => '',
        'type' => 'project',
    ];
    public $photos = [];
    public $photo = '';
    public $link;
    public $links = [];
    public $members = [];
    public $selected_members = [];
    public function mount()
    {
        $this->members = User::all();
    }
    public function submit()
    {
        $this->validate([
            'photos.*' => 'image|max:1024', // 1MB Max
        ]);
        $fileName = [];
        foreach ($this->photos as $key => $photo) {
            $this->photos[$key] = $photo->store('images');
            $fileName[]['name'] = $photo->getClientOriginalName();
            $fileName[]['extension'] = $photo->getClientOriginalExtension();
        }
        dd($fileName);
        $portfolio = Portfolio::create($this->form);
        $portfolio->links = $this->links;
        $portfolio->photos = $this->photos;
        $portfolio->members = $this->selected_members;
        $portfolio->save();
        return redirect()->route('freelancer.teams');
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
    public function getFile()
    {
        dd($this->photos);
    }
    public function uploadImage()
    {

    }
    public function render()
    {
        return view('livewire.freelancer.portfolio.create')
                ->extends('layouts.freelancer')
                ->section('content');
    }
}
