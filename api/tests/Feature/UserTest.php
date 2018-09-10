<?php

namespace Tests\Feature;

use App\Http\Controllers\UserController;
use App\Models\MyUser;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;


class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
//    public function testCreate()
//    {
//        $userController = new UserController();
//        $request = Request::create('/createUser', 'GET', ['email' => 'test1@mail.com', 'password' => 'test123']);
//        $user = json_decode($userController->createUser($request), true);
//        var_dump($user);
//        $this->assertEquals(200, $user->{'code'});
//
//    }

    public function testDelete()
    {
        $userController = new UserController();
        $request = Request::create('/deleteUser', 'GET', ['id' => 10]);
        $user = json_decode($userController->deleteUser($request), true);
        var_dump($user);
        //$this->assertEquals(200, $user->{'code'});
    }
}
