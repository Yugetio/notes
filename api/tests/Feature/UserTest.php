<?php

namespace Tests\Feature;

<<<<<<< HEAD
use Tests\TestCase;

=======
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
>>>>>>> fixConflicts


class UserTest extends TestCase
{
<<<<<<< HEAD
    private $contentType = 'application/x-www-form-urlencoded';
    private $accept = 'application/json';

//    public function testCreate()
//    {
//        $response = $this->post('/api/user',
//            [
//                'email' => 'test@mail.com',
//                'password' => '111111'
//            ]);
//        var_dump($response->getContent());
//        $this->assertEquals(201, $response->status());
//
//    }

//    public function testLogin()
//    {
//        $response = $this->post('/api/login',
//            [
//                'email' => 'test@mail.com',
//                'password' => '111111'
//            ]);
//        var_dump($response->getContent());
//        $this->assertEquals(200, $response->status());
//    }

    public function testMe()
    {
        $token = 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2FwaVwvbG9naW4iLCJpYXQiOjE1MzgzOTQ5NDEsImV4cCI6MTUzODM5ODU0MSwibmJmIjoxNTM4Mzk0OTQxLCJqdGkiOiIyM0RtdnZuWjVYdmJjRFM3Iiwic3ViIjoyMSwicHJ2IjoiN2JiMmUwNTYyYTM3NTc0ZWNiOGNmYTE1ZjgyMTkxNjBjNWZjNTFlMCJ9.SfxxmrddQgac7nFtv_YTifmFeFnDIIuOShJKZUeiaD4';
        $response = $this->withHeaders([
            'Content-Type' => $this->contentType,
            'Accept' => $this->accept,
            'Authorization' => $token,
        ])->post('/api/auth/me');
        var_dump($response->getContent());
        $this->assertEquals(200, $response->status());
    }

//    public function testUpdate()
//    {
//        $response = $this->put('/api/auth/user',
//            [
//            ]);
//        var_dump($response->getContent());
//        $this->assertEquals(200, $response->status());
=======
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
>>>>>>> fixConflicts
//    }

//    public function testDelete()
//    {
<<<<<<< HEAD
//        $response = $this->delete('/api/user/56');
//        var_dump($response->getContent());
//        $this->assertEquals(200, $response->status());
=======
//        $userController = new UserController();
//        $request = Request::create('/user', 'DELETE', ['id' => 50]);
//        $user = $userController->deleteUser($request);
//        $content = json_decode($user->getContent());
//        var_dump($content->code, $content->message);
//        $this->assertEquals(200, $content->code);
>>>>>>> fixConflicts
//    }
}

//FOR STARTING TESTS USE --- vendor/bin/phpunit !!!