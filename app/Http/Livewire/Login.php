<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $form = [
        'email' => '',
        'password' => '',
    ];
    protected $messages = [

        'form.email.required' => 'The Email Address cannot be empty.',

        'form.email.email' => 'The Email Address format is not valid.',

        'form.password.required' => 'The password is required.',

    ];

    protected $rules = [

        'form.email' => 'required|email',
        
        'form.password' => 'required|min:6',
    ]; 

    public function submit(){
        $this->validate();
        
        Auth::attempt($this->form);
        $type = Auth::user()->getType();
        if($type === 0)
            return redirect(route('freelancer.dashboard'));
        elseif($type === 1)
            return redirect(route('client.dashboard'));
        else
            return redirect(route('home'));

    }
    public function render()
    {
        return view('livewire.login')->extends('layouts.master')->section('content');
    }
}
