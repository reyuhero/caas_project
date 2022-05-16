<?php

namespace App\Http\Livewire\Freelancer\Serviceoffering;

use App\Models\ServiceOffering;
use Livewire\Component;

class Index extends Component
{
    public $serviceOfferings, $teamId;
    public function mount($teamId)
    {
        $this->teamId = $teamId;
        $this->serviceOfferings = ServiceOffering::all();
    }
    public function render()
    {
        return view('livewire.freelancer.serviceoffering.index')->extends('layouts.freelancer')->section('content');
    }
}
