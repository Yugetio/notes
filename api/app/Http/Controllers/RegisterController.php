<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\MyUser;

class RegisterController {
    
    public function createUser(Request $request)
    {
        try {
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
            } elseif (User::where('email', $user->email->exists())) {
                throw new UserAlreadyExistException("User already exists ", 1);
            } elseif (!DB::connection()->getDatabaseName()) {
                throw new DataBaseConnectionException("Bad connection with DB ", 1);                
            } else {
                throw new Exception("There is some problem");
            } 
//            else {
//                $user->save();
//            }
        } catch (InvalidDataException $e) {
//            return response()->json([
//                'error' => 400,
//                'message' => $e
//            ]);
              $this->SendResponse(400, $e);
        } catch (UserAlreadyExistException $e) {
            $this->SendResponse(423, $e);
        } catch (DataBaseConnectionException $e) {
            $this->SendResponse(523, $e);
        } catch (Exception $e) {
            $this->SendResponse(500, $e);
        }    
    }
    
    public function SendResponse($code, $exception) {
        return response()->json([
                'error' => $code,
                'message' => $exception,
            ]);
    }
}
