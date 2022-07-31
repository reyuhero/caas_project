<?php

use App\Http\Controllers\TestController;
use App\Models\User;
use Illuminate\Http\Request;
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
Route::get('/login',App\Http\Livewire\Login::class)->name('login');
Route::get('/register',App\Http\Livewire\Register::class)->name('register');
Route::controller(TestController::class)->group(function(){
    Route::get('/test', 'index');
});
// route model binding
Route::get('/users/{user}', function(User $user){
    echo $user->email;
});
// soft delete
Route::get('/user/{user}', function(User $user){
    return $user->email;
})->withTrashed();
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/user/{id}', function($id){
        echo "user id: $id";
    })->name('user');
});
Route::get('/locations/{location:slug}', [TestController::class, 'index'])
    ->name('locations.view')
    ->missing(function(Request $request) {
        return redirect('locations.index');
    });

Route::get('/logout',App\Http\Livewire\Logout::class)->name('logout');
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

Route::group(['middleware' => ['web'], 'namespace' => 'App\Http\Controllers'], function(){

    //Update avatar
    Route::post('/updateavatar', 'UserController@update')->name('updateavatar');
    //Update Name
    Route::post('/nameupdate', 'UserController@nameupdate')->name('nameupdate');

    //Delete Contact
    Route::delete('/delete/{id}', 'UserController@destroy')->name('contact.destroy');

    //Search Contact
    Route::get('/search','UserController@search')->name('user.search');

    //Search Recent Contact
    Route::get('/recentsearch','UserController@recentsearch')->name('user.search.recent');

    //chat Message Search
    Route::get('/messagesearch','UserController@messagesearch')->name('user.search.message');
    //Delete Message
    Route::get('/deleteMessage/{id}', "ChatController@deleteMessage")->name('message.delete');

    // Delete Conversation
    Route::get('/deleteConversation/{id}', "ChatController@deleteConversation")->name('conversation.delete');

    //Group Create
    Route::post('/groups', "GroupController@store")->name('groups');

    //Group Search
    Route::get('/groupsearch',"GroupController@groupsearch")->name('group.search');

    //Group Massage
    Route::get('/groupmessage/{id}', "GroupController@getGroupMessage")->name('group.message');
    Route::post('groupmessage', "GroupController@sendGroupMessage")->name('group.message.send');
    Route::get('/grouplastmessage/{id}', "GroupController@getGroupLastMessage")->name('group.message.last');

    // Delete Group Message
    Route::get('/deletegroupmessage/{id}',"GroupController@deletegroupmessage")->name('group.message.delete');

    // Delete Group Conversation
    Route::get('/deleteGroupConversation/{id}', "GroupController@deleteGroupConversation")->name('groupconversation.delete');

    //Group Message Search
    Route::get('/groupmessagesearch',"GroupController@groupmessagesearch")->name('group.search.message');

    //Massage
    Route::get('/message/{id}', "ChatController@getMessage")->name('message');
    Route::post('/message', "ChatController@sendMessage")->name('message.send');
    Route::post('/typing', "ChatController@sendTyping")->name('message.typing');
    Route::get('/lastmessage/{id}', "ChatController@getLastMessage")->name('message.last');
});
