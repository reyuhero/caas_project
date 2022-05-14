<?php

namespace App\View\Components;

use App\Models\Team;
use Illuminate\View\Component;

class aside extends Component
{

    public $teamId;
    public $team;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($teamId)
    {
        $this->teamId = $teamId;
        $this->team = Team::findOrFail($teamId);


    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.aside');
    }
}
