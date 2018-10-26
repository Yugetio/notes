<?php

namespace Tests\Feature;

<<<<<<< HEAD
use Tests\TestCase;

class AuthTest extends TestCase
{
//    public function testAuth()
//    {
//        $response = $this->post('/api/auth',
//            [
//                'email' => 'test555@mail.com',
//                'password' => 'test123'
//            ]);
//        var_dump($response->getContent());
//        $this->assertEquals(200, $response->status());
//    }
=======
use App\Http\Controllers\AuthController;
use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    public function testAuth()
    {
        $authController = new AuthController();
        $request = Request::create('/auth', 'POST', ['email' => 'test5@mail.com', 'password' => 'test123']);
        $user = $authController->authUser($request);
        $content = json_decode($user->getContent());
        var_dump($content->code, $content->message);
        $this->assertEquals(200, $content->code);
    }
>>>>>>> fixConflicts
}

//FOR STARTING TESTS USE --- vendor/bin/phpunit !!!