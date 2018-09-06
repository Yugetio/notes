<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Connection;

use \Exception;
use \App\Http\MyExceptions\InvalidDataException;
use \App\Http\MyExceptions\UserAlreadyExistException;
use \App\Http\MyExceptions\DataBaseConnectionException;

use \App\Models\MyUser;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class UserController
{
    public function createUser(Request $request)
    {
        try {
            $response = new SendResponse();
            $user = new MyUser();
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            if ( strlen($user->email) > 32 or strlen($user->password) > 32 ) {
                throw new InvalidDataException("Email or password are too long", 1);
            } elseif (strlen($user->email) < 5 or strlen($user->password) < 5) {
                throw new InvalidDataException("Email or password are too short", 1);
            } elseif(!strpos('@',$user->email)){
                throw new InvalidDataException("Email doesn`t consist of @", 1);
            } elseif (preg_match("/[а-яА-ЯёЁ]/", $user->email)) {
               throw new InvalidDataException("Email consists of kirillica", 1);
            } elseif ($user->DB->where('email', $user->email)->exists()) {
                throw new UserAlreadyExistException("User already exists ", 1);
            } elseif (!$user->getConnection()->getDatabaseName()) {
                throw new DataBaseConnectionException("Bad connection with DB ", 1);                
            } else {
                throw new Exception("There is some problem");
            }
        } catch (InvalidDataException $e) {
            $response->SendResponse(400, $e);
        } catch (UserAlreadyExistException $e) {
            $response->SendResponse(423, $e);
        } catch (DataBaseConnectionException $e) {
            $response->SendResponse(523, $e);
        } catch (Exception $e) {
            $response->SendResponse(500, $e);
        }
        $user->save();
        return $response->SendResponse(200, 'User has created');
    }

    public function updateUser($id)
    {
        try {
            $response = new SendResponse();
            $user = new MyUser();
            $user->DB::where('id', '=', $id);
            $user->update(Input::all());
            $user->save();
        } catch (Exception $e){
            $response->SendResponse(500, $e);
        }
        return Redirect::to('/account');
    }

    public function deleteUser($id)
    {
        try {
            $response = new SendResponse();
            $user = new MyUser();
            $user->DB::where('id', '=', $id);
            $user->delete();
        } catch (Exception $e) {
            $response->SendResponse(500, $e);
        }
        return Redirect::to('/register');
    }
}
