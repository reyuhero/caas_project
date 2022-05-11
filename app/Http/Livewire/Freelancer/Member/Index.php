<?php

namespace App\Http\Livewire\Freelancer\Member;

use App\Models\Member;
use Livewire\Component;

class Index extends Component
{
    public $teamId, $members;
    public function mount($teamId)
    {
        $this->teamId = $teamId;
        $this->members = Member::all();
    }
    public function render()
    {
        return view('livewire.freelancer.member.index')->extends('layouts.freelancer')->section('content');
    }
}
