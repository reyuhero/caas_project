<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'home')->name('home');
Route::get('login',\App\Http\Livewire\Login::class)->name('login');
Route::get('register',\App\Http\Livewire\Register::class)->name('register');
ROute::get('freelancer/dashboard',\App\Http\Livewire\Freelancer\Dashboard::class)->name('freelancer.dashboard');
ROute::get('client/dashboard',\App\Http\Livewire\Client\Dashboard::class)->name('client.dashboard');