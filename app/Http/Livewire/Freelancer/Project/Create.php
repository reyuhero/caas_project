<?php

namespace App\Http\Livewire\Freelancer\Project;

use Livewire\Component;

class Create extends Component
{

    public function render()
    {
        return view('livewire.freelancer.project.create')->extends('layouts.master')->section('content');
    }
}
