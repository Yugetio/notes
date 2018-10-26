<?php

use Illuminate\Http\Request;

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
use Illuminate\Support\Facades\Route;

Route::post('/user', 'Auth\UserController@createUser');
Route::post('/login', 'Auth\LoginController@login');

Route::group([
    ['middleware' => 'jwt.auth', 'jwt.refresh'],
    'prefix' => 'auth'

], function () {
    Route::put('/user', 'Auth\UserController@updateUser');
    Route::delete('/user', 'Auth\UserController@deleteUser');

    Route::post('/logout', 'Auth\LoginController@logout');
    Route::post('/refresh', 'Auth\LoginController@refresh');
    Route::post('/me', 'Auth\LoginController@me');

    Route::post('/note', 'NoteController@createNote');
    Route::put('/note/{id}', 'NoteController@updateNote');
    Route::delete('/note/{id}', 'NoteController@deleteNote');
});
