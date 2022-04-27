<?php

namespace App\Http\Livewire\Freelancer\Project;

use Livewire\Component;

class ApplyProcess extends Component
{
    public $project = '';
    public function mount($project)
    {
        $this->project = $project;
    }
    public function render()
    {
        return view('livewire.freelancer.project.apply-process');
    }
}
