<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.client.dashboard')->extends('layouts.master')->section('content');
    }
}
