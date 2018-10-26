<?php

namespace App\Http\Controllers;

<<<<<<< HEAD

use App\Http\MyExceptions\DataBaseConnectionException;
use App\Http\MyExceptions\InvalidDataException;
use App\Http\MyExceptions\UserAlreadyExistException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use \App\Http\MyExceptions\UserNotFoundException;
=======
use Illuminate\Http\Request;

use \Exception;
use \App\Http\MyExceptions\InvalidDataException;
use \App\Http\MyExceptions\UserAlreadyExistException;
use \App\Http\MyExceptions\DataBaseConnectionException;
>>>>>>> fixConflicts

use \App\Models\MyUser;


<<<<<<< HEAD
class UserController extends MyAbstractClass
=======
class UserController
>>>>>>> fixConflicts
{
    public function createUser(Request $request)
    {
        try {
<<<<<<< HEAD
            $user = new MyUser();
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            //$user = MyUser::firstOrCreate($request->all());
            if (strlen($user->email) > 32 or strlen($user->password) > 32) {
                throw new InvalidDataException();
            } elseif (strlen($user->email) < 5 or strlen($user->password) < 5) {
                throw new InvalidDataException();
            } elseif (!strpos($user->email, '@')) {
                throw new InvalidDataException();
            } elseif (preg_match("/[а-яА-ЯёЁ]/", $user->email)) {
                throw new InvalidDataException();
            } elseif ($user->where('email', $user->email)->exists()) {
                throw new UserAlreadyExistException();
            } elseif (!$user->getConnection()->getDatabaseName()) {
                throw new DataBaseConnectionException();
            }
            $user->save();
            return new JsonResponse(['message' => 'User has created'], 201);
        } catch (\Exception $e) {
            return $this->SendError($e);
        }
    }

    public function updateUser(Request $request, int $id)
    {
        try {
            $user = new MyUser();
            if (!$user->find($id)) {
                throw new UserNotFoundException();
            }
            $user->find($id)->update($request->all());
            return new JsonResponse(['message'=>'User has updated'], 200);
        } catch (\Exception $e) {
            return  $this->SendError($e);
=======
            $response = new ResponseForFront();
            $user = new MyUser();
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            if ( strlen($user->email) > 32 or strlen($user->password) > 32 ) {
                throw new InvalidDataException("Email or password are too long", 1);
            } elseif (strlen($user->email) < 5 or strlen($user->password) < 5) {
                throw new InvalidDataException("Email or password are too short", 1);
            } elseif(!strpos($user->email,'@')){
                throw new InvalidDataException("Email doesn`t consist of @", 1);
            } elseif (preg_match("/[а-яА-ЯёЁ]/", $user->email)) {
               throw new InvalidDataException("Email consists of kirillica", 1);
            } elseif ($user->where('email', $user->email)->exists()) {
                throw new UserAlreadyExistException("User already exists ", 1);
            } elseif (!$user->getConnection()->getDatabaseName()) {
                throw new DataBaseConnectionException("Bad connection with DB ", 1);                
            } else {
                $user->save();
                return $response->SendResponse(201, 'User has created');
            }

        } catch (InvalidDataException $e) {
            return $response->SendResponse(400, $e);
        } catch (UserAlreadyExistException $e) {
            return $response->SendResponse(423, $e);
        } catch (DataBaseConnectionException $e) {
            return $response->SendResponse(523, $e);
        } catch (Exception $e) {
            return $response->SendResponse(500, $e);
        }
        //$user->save();
        //return $response->SendResponse(201, 'User has created');
    }


    public function updateUser(Request $request)
    {
        try {
            $response = new ResponseForFront();
            $user = new MyUser();
            if ($user->find($request->input('id'))) {
                $user->update($request->all());
                $user->save();
                return $response->SendResponse(200, 'User has updated');
            } else {
                throw new Exception("There isn`t user with this id");
            }
        } catch (Exception $e) {
            return $response->SendResponse(500, $e);
>>>>>>> fixConflicts
        }
        //Redirect::to('/account');
    }

<<<<<<< HEAD
    public function deleteUser(int $id)
    {
        try {
            $user = new MyUser();
            if (!$user->find($id)) {
                throw new UserNotFoundException();
            }
            $user->find($id)->delete();
            return new JsonResponse(['message'=>'User has deleted'], 200);
        } catch (\Exception $e) {
            return  $this->SendError($e);
=======

    public function deleteUser(Request $request)
    {
        try {
            $response = new ResponseForFront();
            $user = new MyUser();
            //$id = $request->input('id');
            if ($user->find($request->input('id'))) {
                $user->delete();
                return $response->SendResponse(200, 'User has deleted');
            } else {
                throw new Exception("There isn`t user with this id");
            }
        } catch (Exception $e) {
            return $response->SendResponse(500, $e);
>>>>>>> fixConflicts
        }
        //Redirect::to('/register');
    }
}
