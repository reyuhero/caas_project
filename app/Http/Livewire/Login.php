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
        $user = Auth::user();
        switch($user->type){
            case "freelancer":
                return redirect(route('freelancer.dashboard'));
            case "client":
                return redirect(route('client.dashboard'));
            default:
                return session()->flash('error', 'not loged in');
        }
    }
    public function render()
    {
        return view('livewire.login')->extends('layouts.master')->section('content');
    }
}
