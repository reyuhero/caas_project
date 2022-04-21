<?php

namespace App\Http\Livewire\Freelancer\Project;

use App\Models\Project;
use Livewire\Component;

class Create extends Component
{
    public $form = [
        'title' => '',
        'description' => '',
        'duration' => '',
        'start_date' => '',
        'method' => '',
        'total_budget' => '',
        'monthly_budget' => '',
        'budget_duration' => '',
        'team_size' => '',
        'scope' => '',
        'user_id' => '',
        'team_id' => '',
        'categories_id' => '',
        'skills_id' => '',
        'files_id' => '',
        'team_id' => '',
        'user_id' => '',
    ];
    public function submit(){
        $this->validate();
        Project::create($this->form);
        return redirect(route('freelancer.project'));

    }
    public function render()
    {
        return view('livewire.freelancer.project.create')->extends('layouts.freelancer-layout')->section('content');
    }
}
