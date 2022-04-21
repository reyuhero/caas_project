<?php

namespace App\Http\Livewire\Freelancer\Project;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.freelancer.project.index')
            ->extends('layouts.freelancer-layout')
            ->section('content');
    }
}
