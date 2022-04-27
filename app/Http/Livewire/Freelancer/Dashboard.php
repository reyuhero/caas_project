<?php

namespace App\Http\Livewire\Freelancer;

use App\Models\Project;
use Livewire\Component;

class Dashboard extends Component
{
    public $projects;
    public function mount()
    {
        $this->projects = Project::take(4)->get();
    }
    public function render()
    {
        return view('livewire.freelancer.dashboard')
        ->extends('layouts.master')
        ->section('content');
    }
}
