<?php

namespace Tests\Feature;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class UserTest extends TestCase
{
//    public function userCreateTest()
//    {
//        $userController = new UserController();
//        $request = Request::create('/createUser', 'GET', ['email' => 'test@mail.com', 'password' => 'test123']);
//        $this->assertEquals('200', $userController->createUser($request));
//    }

    public function userDeleteTest()
    {
        $userController = new UserController();
        //$request = Request::create('/createUser', 'GET', ['email' => 'test', 'password' => 'test']);
        $this->assertEquals('200', $userController->deleteUser(1));
    }
}
