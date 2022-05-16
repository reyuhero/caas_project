<?php

namespace App\Http\Livewire\Freelancer\Team;

use App\Models\Category;
use App\Models\File;
use App\Models\Portfolio;
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
    public $logo = null;
    public $file, $bannerFile;
    public $banner = null;
    public $categories = [];
    public $selected_categories = [];
    public $selected_user = [];
    public $users = [];
    public $portfolios = [];

    public function submit()
    {
        $this->validate([
            'logo.*' => 'image|mimes:png,jpeg,jpg:max:1024', // 1MB Max
            'banner.*' => 'image|mimes:png,jpeg'
        ]);
        foreach ($this->logo as $key => $logo) {
            $this->logo[$key] = $logo->store('images');
        }
        foreach ($this->banner as $key => $banner) {
            $this->banner[$key] = $banner->store('images');
        }
        $userID = auth()->user()->id;
        $categories_ids = array_map( function($item) {
            return $item['id'];
        }, $this->selected_categories);

        $bannerF = File::create();
        $bannerF->name = $this->bannerFile['name'];
        $bannerF->size = $this->bannerFile['size'];
        $bannerF->mime = $this->bannerFile['ext'];
        $bannerF->location = reset($this->banner);
        $bannerF->save();

        $file = File::create();
        $file->name = $this->file['name'];
        $file->size = $this->file['size'];
        $file->mime = $this->file['ext'];
        $file->location = reset($this->logo);
        $file->save();

        $team = Team::create($this->form);
        $team->categories()->attach($categories_ids);
        $team->logo_id = $file->id;
        $team->banner_id = $bannerF->id;
        $team->ownership_id = $userID;
        $team->save();

        return redirect()->route('freelancer.teams');
    }
    public function mount()
    {
        $this->categories = Category::all();
        $this->portfolios = Portfolio::all();
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

    public function getBanner($file)
    {
        $this->bannerFile['name'] = $file['name'];
        $this->bannerFile['size'] = $file['size'];
        $this->bannerFile['ext'] = $file['ext'];
    }
    public function render()
    {
        return view('livewire.freelancer.team.create')
        ->extends('layouts.freelancer')
        ->section('content');
    }
}
