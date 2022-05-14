<?php

use App\Models\Team;
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
        Route::get("/dashboard", \Dashboard::class)->name('freelancer.dashboard');
        Route::get("/project/create", \Project\Create::class)->name('freelancer.create.project');
        Route::get("/project", \Project\Index::class)->name('freelancer.project');
        Route::get("/team/{teamId}", \Team\Index::class)->name('freelancer.team');
        Route::get("/team/create", \Team\Create::class)->name('freelancer.team.create');
        // ! teams list
        Route::get('/teams', \Teams\Index::class)->name('freelancer.teams');
        // ! portfilio
        Route::get("/portfolio/create", \Portfolio\Create::class)->name('freelancer.portfolio.create');

        // ! service offering
        Route::get("/serviceoffering/create", \Serviceoffering\Create::class)->name('freelancer.serviceoffering.create');
        // ! talent recruitment
        Route::get("/talent-recruitment/create", \TalentRecruitment\Create::class)->name('freelancer.talentrecruitment.create');
        // ! notices
        Route::get('/notice/{teamId}', \Notice\Index::class)->name('freelancer.notice');
        // ! members
        Route::get('/member/{teamId}', \Member\Index::class)->name('freelancer.member');
    });
    Route::group(['middleware'=> ['auth','user-access:client'], 'namespace' => 'Client'],function(){
        Route::get("/client/dashboard", Dashboard::class)->name('client.dashboard');
    });
});
Route::get('/login',App\Http\Livewire\Login::class)->name('login');
Route::get('/register',App\Http\Livewire\Register::class)->name('register');
Route::get('/logout',App\Http\Livewire\Logout::class)->name('logout');
