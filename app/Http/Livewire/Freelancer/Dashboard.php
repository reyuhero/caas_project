<?php

namespace App\Http\Livewire\Freelancer;

use Livewire\Component;

class Dashboard extends Component
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }
    public function render()
    {
        return view('livewire.freelancer.dashboard')
        ->extends('layouts.freelancer-layout')
        ->section('content');
    }
}
