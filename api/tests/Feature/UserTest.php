<?php

namespace Tests\Feature;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;


class UserTest extends TestCase
{
//    public function testCreate()
//    {
//        //$response = $this->json('POST', '/user', ['email' => 'test4@mail.com', 'password' => 'test']);
//        //var_dump($response);
//        $userController = new UserController();
//        $request = Request::create('/user', 'POST', ['email' => 'test5@mail.com', 'password' => 'test123']);
//        $user = $userController->createUser($request);
//        $content = json_decode($user->getContent());
//        var_dump($content->code, $content->message);
//        //preg_match("/(0m: )(.*?)(\\033)/", $content->message->xdebug_message, $match); //find message
//        //var_dump($match[2]); //output message
//        $this->assertEquals(201, $content->code);
//    }
//        public function testUpdate()
//    {
//        $userController = new UserController();
//        $request = Request::create('/user', 'PUT', ['email' => 'testoiupdate@mail.com', 'password' => 'test321', 'id' => 51]);
//        $user = $userController->updateUser($request);
//        $content = json_decode($user->getContent());
//        var_dump($content->code, $content->message);
//        $this->assertEquals(200, $content->code);
//    }

//    public function testDelete()
//    {
//        $userController = new UserController();
//        $request = Request::create('/user', 'DELETE', ['id' => 50]);
//        $user = $userController->deleteUser($request);
//        $content = json_decode($user->getContent());
//        var_dump($content->code, $content->message);
//        $this->assertEquals(200, $content->code);
//    }
}

//FOR STARTING TESTS USE --- vendor/bin/phpunit !!!