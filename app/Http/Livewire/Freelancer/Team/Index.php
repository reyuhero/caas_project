<?php

namespace App\Http\Livewire\Freelancer\Team;

use App\Models\Team;
use Livewire\Component;

class Index extends Component
{
    public $team, $teamId;
    public function mount($teamId)
    {
        $this->teamId = $teamId;
        $this->team = Team::findOrFail($teamId);
    }
    public function render()
    {
        return view('livewire.freelancer.team.index')
        ->extends('layouts.freelancer')
        ->section('content');
    }
}
