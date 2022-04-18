<?php

namespace App\Http\Livewire\Freelancer;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.freelancer.dashboard')
        ->extends('layouts.master')
        ->section('content');
    }
}
