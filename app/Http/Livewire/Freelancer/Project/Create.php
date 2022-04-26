<?php

namespace App\Http\Livewire\Freelancer\Project;

use App\Models\Category;
use App\Models\Project;
use App\Models\Skill;
use Livewire\Component;
use Livewire\Request;

class Create extends Component
{
    public $form = [
        'title' => "",
        'description' => "",
        'duration' => "",
        'start_date' => "",
        'method' => "",
        'total_budget' => "",
        'team_size' => "",
        'scope' => "",
        'user_id' => "",
    ];
    public $categories = [];
    public $selected_categories = [];
    public $grouped_skills = [];
    public $skills = [];
    public $selected_skills = [];
    public $suggested_skills = [
        [
            "id" => 1,
            "name"=> "web3",
            "category_id" => 1
        ],
        [
            "id" => 7,
            "name"=> "metaverse",
            "category_id" => 1
        ],
    ];
    public function mount()
    {
        $this->categories = Category::select(['name','id','icon'])->get();
        $this->skills = Skill::select(['name', 'id', 'category_id'])->with('category:id,name')->orderBy('created_at', 'desc')->get();
        $this->grouped_skills = Skill::select(['name','id','category_id'])->with('category:id,name')->get()->mapToGroups(function($item, $key){
            return [$item->category->name => $item];
        });
        $this->form['user_id'] = auth()->user()->id;
    }
    public function submit()
    {
        $categories_ids = array_map( function($item) {
            return $item['id'];
        }, $this->selected_categories);
        $skills_ids = array_map( function($item) {
            return $item['id'];
        }, $this->selected_skills);
        $project = Project::create($this->form);
        $project->categories()->attach($categories_ids);
        $project->skills()->attach($skills_ids);
        $project->save();
        return redirect(route('freelancer.project'));
    }
    public function addCategory($item)
    {
        if(!in_array($item, $this->selected_categories)){
            return array_unshift($this->selected_categories, $item);
        }
    }
    public function addSkill($item)
    {
        if(!in_array($item, $this->selected_skills))
            return array_unshift($this->selected_skills, $item);
    }
    public function removeCategory($key)
    {
        unset($this->selected_categories[$key]);
    }
    public function removeSkill($key)
    {
        unset($this->selected_skills[$key]);
    }
    public function render()
    {
        return view('livewire.freelancer.project.create')->extends('layouts.master')->section('content');
    }
}
