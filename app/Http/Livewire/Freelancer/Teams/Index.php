<?php

namespace App\Http\Livewire\Freelancer\Teams;

use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $teams = [];
    public $selected_menu;
    public $userId;
    public $asideMenu = [
        [
            'id' => 'menu1',
            'title' => 'Your teams',
        ],
        [
            'id' => 'menu2',
            'title' => 'Teams Managed by you',
        ],
        [
            'id' => 'menu3',
            'title' => 'Applied Teams',
        ],
        [
            'id' => 'menu4',
            'title' => 'Invitaion for you',
        ],
        [
            'id' => 'menu5',
            'title' => 'Discover',
        ],
        [
            'id' => 'menu6',
            'title' => 'Recently viewed',
        ],
    ];
    public function mount()
    {
        $this->userId = auth()->user()->id;
        $this->teams = Team::where('ownership_id', $this->userId)->get();
    }
    public function selectedMenu()
    {
        dd($this->selected_menu);
    }
    public function delete($id)
    {
        Team::destroy($id);
        return redirect()->route('freelancer.teams');
    }
    public function render()
    {
        return view('livewire.freelancer.teams.index')->extends('layouts.freelancer')->section('content');
    }
}
