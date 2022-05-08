<?php

namespace App\Http\Livewire\Freelancer\Team;

use App\Models\Team;
use Livewire\Component;

class Index extends Component
{
    public $teams;
    public function mount()
    {
        $this->teams = Team::all();
    }
    public function render()
    {
        return view('livewire.freelancer.team.index')
        ->extends('layouts.freelancer')
        ->section('content');
    }
}
