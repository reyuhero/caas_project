<?php

namespace App\Http\Livewire\Freelancer\TalentRecruitment;

use App\Models\Category;
use App\Models\Skill;
use App\Models\TalentRecruitment;
use Livewire\Component;

class Create extends Component
{
    public $form = [
        'title' => '',
        'description' => '',
        'skills' => [],
        'categories' => [],
    ];
    public $categories = [];
    public $selected_categories = [];

    public $teamId;

    public $skills = [];
    public $selected_skills = [];
    public $grouped_skills = [];

    public function mount($teamId)
    {
        $this->categories = Category::all();
        $this->skills = Skill::all();
        $this->grouped_skills = Skill::select(['name','id','category_id'])->with('category:id,name')->get()->mapToGroups(function($item, $key){
            return [$item->category->name => $item];
        });
        $this->teamId = $teamId;
    }
    public function submit()
    {
        $categories_ids = array_map( function($item) {
            return [
                'id' => $item['id'],
                'name' => $item['name'],
                'icon' => $item['icon'],
            ];
        }, $this->selected_categories);
        $skills_ids = array_map(function($item) {
            return [
                'id' => $item['id'],
                'name' => $item['name'],
            ];
        }, $this->selected_skills);
        $item = TalentRecruitment::create($this->form);
        $item->skills = $skills_ids;
        $item->categories = $categories_ids;
        $item->save();
        return redirect()->route('freelancer.team');
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
    public function addSkill($item)
    {
        if(!in_array($item, $this->selected_skills))
            return array_unshift($this->selected_skills, $item);
    }
    public function removeSkill($key)
    {
        unset($this->selected_skills[$key]);
    }
    public function render()
    {
        return view('livewire.freelancer.talent-recruitment.create')->extends('layouts.freelancer')->section('content');
    }
}
