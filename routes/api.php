<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Update avatar
Route::post('/updateavatar', 'UserController@update')->name('updateavatar');

//Update Name
Route::post('/nameupdate', 'UserController@nameupdate')->name('nameupdate');

//Delete Contact
Route::delete('/delete/{id}', 'UserController@destroy')->name('contact.destroy');

//Search Contact
Route::get('/search','UserController@search');

//Search Recent Contact
Route::get('/recentsearch','UserController@recentsearch');

//chat Message Search
Route::get('/messagesearch','UserController@messagesearch');
