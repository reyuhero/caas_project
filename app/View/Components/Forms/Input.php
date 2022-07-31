<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{
    public $label, $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $id)
    {
        $this->label = $label;
        $this->id = $id;
    }

    public function render()
    {
        return view('components.forms.input');
    }
}
