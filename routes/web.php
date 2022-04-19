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
Route::group(['middleware' => ['web'], 'namespace' => 'App\Http\Livewire'], function(){
    Route::group([
        'middleware'=> ['auth','user-access:freelancer'],
        'namespace' => 'Freelancer',
        'prefix' => 'freelancer'
    ],function(){
        Route::get("/dashboard", Dashboard::class)->name('freelancer.dashboard');
        Route::get("/project/create", Project\Create::class)->name('freelancer.create.project');
    });
    Route::group(['middleware'=> ['auth','user-access:client'], 'namespace' => 'Client'],function(){
        Route::get("/client/dashboard", Dashboard::class)->name('client.dashboard');
    });
});
Route::get('/login',App\Http\Livewire\Login::class)->name('login');
Route::get('/register',App\Http\Livewire\Register::class)->name('register');
Route::get('/logout',App\Http\Livewire\Logout::class)->name('logout');
