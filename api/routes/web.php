<?php

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


use Illuminate\Support\Facades\Route;

Route::post('/register', 'UserController@createUser');
Route::put('/update', 'UserController@updateUser');
Route::delete('/delete', 'UserController@deleteUser');

Route::post('/auth', 'AuthController@authUser');