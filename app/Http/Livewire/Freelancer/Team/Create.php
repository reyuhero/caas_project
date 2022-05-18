<?php

namespace App\Http\Livewire\Freelancer\Team;

use App\Models\Category;
use App\Models\File;
use App\Models\Portfolio;
use App\Models\ServiceOffering;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    protected $rules = [
        'name' => 'required|string',
        'url' => 'required|string',
        'tagline' => 'required|string',
        'description' => 'nullable',
        'logo' => 'image|max:1024',
        'banner' => 'image|max:2048',
    ];
    public $name, $url, $tagline, $description, $logo, $banner, $categories;
    public $users, $serviceOfferings, $portfolios;
    public $selected_categories = [];
    public $selected_users = [];
    public function mount()
    {
        $this->categories = Category::all();
        $this->portfolios = Portfolio::all();
        $this->users = User::all();
        $this->serviceOfferings = ServiceOffering::all();
    }
    public function save()
    {
        dd($this->logo->getClientOriginalExtension());
    }
    public function submit()
    {
        $this->validate();
        $logoFile = [];
        $logoFile['size'] = $this->logo->getSize();
        $logoFile['name'] = $this->logo->getClientOriginalName();
        $logoFile['mime'] = $this->logo->getClientOriginalExtension();
        $logoFile['location'] = $this->logo->store('images');
        $bannerFile = [];
        $bannerFile['size'] = $this->banner->getSize();
        $bannerFile['name'] = $this->banner->getClientOriginalName();
        $bannerFile['mime'] = $this->banner->getClientOriginalExtension();
        $bannerFile['location'] = $this->banner->store('images');

        $userID = auth()->user()->id;
        $categories_ids = array_map( function($item) {
            return $item['id'];
        }, $this->selected_categories);

        $logo = File::create();
        $logo->name = $logoFile['name'];
        $logo->size = $logoFile['size'];
        $logo->mime = $logoFile['mime'];
        $logo->location = $logoFile['location'];
        $logo->save();

        $banner = File::create();
        $banner->name = $bannerFile['name'];
        $banner->size = $bannerFile['size'];
        $banner->mime = $bannerFile['mime'];
        $banner->location = $bannerFile['location'];
        $banner->save();
        // selected users save in member
        $team = Team::create();
        $team->name = $this->name;
        $team->url = $this->url;
        $team->description = $this->description;
        $team->tagline = $this->tagline;
        $team->categories()->attach($categories_ids);
        $team->logo_id = $logo->id;
        $team->banner_id = $banner->id;
        $team->ownership_id = $userID;
        $team->save();

        return redirect()->route('freelancer.teams');
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
