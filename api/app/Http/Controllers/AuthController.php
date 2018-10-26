<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use \Exception;
use \App\Http\MyExceptions\UserNotRegisterException;
use \App\Http\MyExceptions\DataBaseConnectionException;
use Illuminate\Http\JsonResponse;

use \App\Models\MyUser;

class AuthController extends MyAbstractClass
=======
use Illuminate\Database\Connection;
use \Exception;
use \App\Http\MyExceptions\UserNotRegisterException;
use \App\Http\MyExceptions\DataBaseConnectionException;

use \App\Models\MyUser;

class AuthController
>>>>>>> fixConflicts
{
    public function authUser(Request $request)
    {
        try {
<<<<<<< HEAD
            $user = new MyUser();
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            if (!$user->find([$user->email, $user->password])){
                throw new UserNotRegisterException();
            }
            return new JsonResponse(['user_id'=>$user->id], 200);
        } catch (Exception $e) {
            return $this->SendError($e);
=======
            $response = new ResponseForFront;
            $user = new MyUser();
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            if ( $user->where('email', $user->email)->exists() and $user->where('password', $user->password)->exists() ){
                return $response->SendResponse(200, 'Auth ok');
            } elseif (!$user->getConnection()->getDatabaseName()) {
                throw new DataBaseConnectionException("Bad connection with DB ", 1);
            }  else {
                throw new UserNotRegisterException('User isn`t registered');
            }
        } catch (DataBaseConnectionException $e) {
            return $response->SendResponse(523, $e);
        } catch (UserNotRegisterException $e) {
            return $response->SendResponse(401, $e);
        } catch (Exception $e) {
            return $response->SendResponse(500, $e);
>>>>>>> fixConflicts
        }
    }
}

