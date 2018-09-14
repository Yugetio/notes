<?php

namespace Tests\Feature;

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
}

//FOR STARTING TESTS USE --- vendor/bin/phpunit !!!