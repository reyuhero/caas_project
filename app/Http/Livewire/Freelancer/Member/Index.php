<?php

namespace App\Http\Livewire\Freelancer\Member;

use App\Models\Member;
use App\Models\Role;
use Livewire\Component;

class Index extends Component
{
    public $teamId, $members, $roles;
    public function mount($teamId)
    {
        $this->roles = Role::where('name','like','%Team%')->get();
        $this->teamId = $teamId;
        $this->members = Member::where('team_id', $teamId)->get();
    }
    public function updateRole($role)
    {
        dd($role);
    }

    public function render()
    {
        return view('livewire.freelancer.member.index')->extends('layouts.freelancer')->section('content');
    }
}
