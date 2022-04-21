<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $showDropdown = false;
    public $form = [
        'name' => '',
        'email' => '',
        'password' => '',
        'password_confirmation' => '',
        'type' => 1,
    ];
    protected $messages = [

        'form.name.required' => 'The Name cannot be empty.',

        'form.email.required' => 'The Email Address cannot be empty.',

        'form.email.email' => 'The Email Address format is not valid.',

        'form.password.required' => 'The password is required.',

        'form.password.confirmed' => 'The password is not match.',

    ];
    protected $rules = [
        'form.name' => 'required|min:3',
        'form.email' => 'required|email',
        'form.password' => 'required|min:6|confirmed',
    ];
    public function submit()
    {
        $this->validate();
        $this->form['password'] = bcrypt($this->form['password']);
        User::create($this->form);
        return redirect(route('login'));
    }
    public function render()
    {
        return view('livewire.register', ['title' => 'register'])->extends('layouts.master')->section('content');
    }
}
