<?php

namespace App\Http\Controllers;


use App\Http\MyExceptions\DataBaseConnectionException;
use App\Http\MyExceptions\InvalidDataException;
use App\Http\MyExceptions\UserAlreadyExistException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use \App\Http\MyExceptions\UserNotFoundException;

use \App\Models\MyUser;


class UserController extends MyAbstractClass
{
    public function createUser(Request $request)
    {
        try {
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
        }
        //Redirect::to('/account');
    }

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
        }
        //Redirect::to('/register');
    }
}
