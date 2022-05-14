<?php

namespace App\Http\Livewire\Freelancer\Notice;

use App\Models\Notice;
use Livewire\Component;

class Create extends Component
{
    public $form = [
        'title' => '',
        'description' => '',
        'type' => '',
    ];
    public $teamId, $memberId;
    public function mount($teamId, $memberId)
    {
        $this->teamId =  intval($teamId);
        $this->memberId = intVal($memberId);
    }
    public function submit()
    {
        $notice = Notice::create($this->form);
        $notice->team_id = intVal($this->teamId);
        $notice->member_id = intVal($this->memberId);
        $notice->save();
        return redirect()->route('freelancer.notice',$this->teamId);
    }
    public function render()
    {
        return view('livewire.freelancer.notice.create');
    }
}
