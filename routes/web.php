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
        Route::get("/serviceoffering/{teamId}", \Serviceoffering\Index::class)->name('freelancer.serviceoffering');
        // ! talent recruitment
        Route::get("/talent-recruitment/create", \TalentRecruitment\Create::class)->name('freelancer.talentrecruitment.create');
        // ! notices
        Route::get('/notice/{teamId}', \Notice\Index::class)->name('freelancer.notice');
        // ! members
        Route::get('/member/{teamId}', \Member\Index::class)->name('freelancer.member');
        // ! chat
        Route::get('/chat/{teamId}', \Chat\Index::class)->name('freelancer.chat');
    });
    Route::group(['middleware'=> ['auth','user-access:client'], 'namespace' => 'Client'],function(){
        Route::get("/client/dashboard", Dashboard::class)->name('client.dashboard');
    });
});
Route::get('/login',App\Http\Livewire\Login::class)->name('login');
Route::get('/register',App\Http\Livewire\Register::class)->name('register');
Route::get('/logout',App\Http\Livewire\Logout::class)->name('logout');

//Delete Message
Route::get('/deleteMessage/{id}','ChatController@deleteMessage');

// Delete Conversation
Route::get('/deleteConversation/{id}', 'ChatController@deleteConversation')->name('conversation.delete');

//Group Create
Route::post('/groups', 'GroupController@store')->name('groups');

//Group Search
Route::get('/groupsearch','GroupController@groupsearch');

//Group Massage
Route::get('/groupmessage/{id}', 'GroupController@getGroupMessage')->name('groupmessage');
Route::post('groupmessage', 'GroupController@sendGroupMessage');
Route::get('/grouplastmessage/{id}', 'GroupController@getGroupLastMessage');

// Delete Group Message
Route::get('/deletegroupmessage/{id}','GroupController@deletegroupmessage');

// Delete Group Conversation
Route::get('/deleteGroupConversation/{id}', 'GroupController@deleteGroupConversation')->name('groupconversation.delete');

//Group Message Search
Route::get('/groupmessagesearch','GroupController@groupmessagesearch');

//Massage
Route::get('/message/{id}', 'ChatController@getMessage')->name('message');
Route::post('message', 'ChatController@sendMessage');
Route::post('typing', 'ChatController@sendTyping');
Route::get('/lastmessage/{id}', 'ChatController@getLastMessage');
