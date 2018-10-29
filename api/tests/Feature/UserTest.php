<?php

namespace Tests\Feature;

use Tests\TestCase;



class UserTest extends TestCase
{
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
//    }

//    public function testDelete()
//    {
//        $response = $this->delete('/api/user/56');
//        var_dump($response->getContent());
//        $this->assertEquals(200, $response->status());
//    }
}

//FOR STARTING TESTS USE --- vendor/bin/phpunit !!!