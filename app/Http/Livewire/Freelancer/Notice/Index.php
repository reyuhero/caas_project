<?php

namespace App\Http\Livewire\Freelancer\Notice;

use App\Models\Notice;
use Livewire\Component;

class Index extends Component
{

    public $teamId;
    public $notices = [];
    public function mount($teamId)
    {
        $this->teamId = $teamId;
        $this->notices = Notice::all();
    }
    public function delete($id)
    {
        Notice::destroy($id);
        return redirect()->route('freelancer.notice');
    }
    public function render()
    {
        return view('livewire.freelancer.notice.index')->extends('layouts.freelancer')->section('content');
    }
}
