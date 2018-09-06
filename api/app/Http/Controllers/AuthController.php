<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use \Exception;
use \App\Http\MyExceptions\DataBaseConnectionException;
use App\Http\MyExceptions\UserNotRegisterException;
use \App\Models\MyUser;

class AuthController
{
    public function authUser(Request $request)
    {
        try {
            $response = new SendResponse();
            $user = new MyUser();
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            if (!DB::table('users')
                ->where('email', '=', $user->email)
                ->where('password', '=', $user->password)
                ->exists()){
                throw new UserNotRegisterException('User isn`t registered');
            } elseif (!$user->getConnection()->getDatabaseName()) {
                throw new DataBaseConnectionException("Bad connection with DB ", 1);
            } else {
                throw new Exception("There is some problem");
            }
        } catch (DataBaseConnectionException $e) {
            $response->SendResponse(523, $e);
        } catch (UserNotRegisterException $e) {
            $response->SendResponse(401, $e);
        }
        catch (Exception $e) {
            $response->SendResponse(500, $e);
        }
        return $response->SendResponse(200, 'Auth ok');
    }
}