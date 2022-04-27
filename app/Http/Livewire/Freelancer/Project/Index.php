<?php

namespace App\Http\Livewire\Freelancer\Project;

use App\Models\Category;
use App\Models\Project;
use App\Models\Team;
use Livewire\Component;

class Index extends Component
{
    public $projects = [];
    public $teams = [];
    public $cover_letter = '';
    public $propose_budget = '';
    public $referred_team = '';
    public $propose_budget_monthly = '';
    public $showcase = '';
    public $project_selected;
    public $team_selected;
    public $listeners = ['selectProject'];
    public function mount()
    {
        $this->projects = Project::latest()->get();
        $this->teams = Team::latest()->get();
    }
    public function submit()
    {
        $id = $this->project_selected['id'];
        $project = Project::find($id);
        $project->propose_budget = $this->propose_budget;
        $project->propose_budget_monthly = $this->propose_budget_monthly;
        $project->referred_team = $this->referred_team;
        $project->showcase = $this->showcase;
        $project->cover_letter = $this->cover_letter;
        $project->save();
        return redirect(route('freelancer.project'));
    }
    public function selectTeam($id)
    {
        $team = Team::find($id);
        return $this->team_selected = $team;
    }
    public function selectProject($project)
    {
        return $this->project_selected = $project;
    }
    public function render()
    {
        return view('livewire.freelancer.project.index')
            ->extends('layouts.master')
            ->section('content');
    }
}
