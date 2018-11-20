<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\MyUser;

class UserTest extends TestCase
{

//    public function test_Create_Successful()
//    {
//        $response = $this->post('/api/user',
//            [
//                'email' => 'test1@mail.com',
//                'password' => '111gsadgsadg1'
//            ]);
////        var_dump($response->getContent());
//        $this->assertEquals(201, $response->status());
//    }
//
//    public function test_Create_EmptyEmail_Error()
//    {
//        $response = $this->post('/api/user',
//            [
//                'email' => '',
//                'password' => '1afsa111'
//            ]);
////        var_dump($response->getContent());
//        $this->assertEquals(500, $response->status());
//    }
//
//    public function test_Create_EmptyPassword_Error()
//    {
//        $response = $this->post('/api/user',
//            [
//                'email' => 'test1_1@mail.com',
//                'password' => ''
//            ]);
////        var_dump($response->getContent());
//        $this->assertEquals(500, $response->status());
//    }
//
//    public function test_Create_EmailExist_Error()
//    {
//        $response = $this->post('/api/user',
//            [
//                'email' => 'test1@mail.com',
//                'password' => '1afsa111'
//            ]);
////        var_dump($response->getContent());
//        $this->assertEquals(500, $response->status());
//    }
//
//    public function test_Update_Successful()
//    {
//        $user = MyUser::orderBy('created_at', 'desc')->first();
//        $id = $user -> id;
//        $response = $this->put('/api/auth/user'.$id,
//            [
//                'caption' => 'upd_1'
//            ]);
////        var_dump($response->getContent());
//        $this->assertEquals(200, $response->status());
//    }
//
//    public function test_Update_EmptyCaption_Error()
//    {
//        $user = MyUser::orderBy('created_at', 'desc')->first();
//        $id = $user -> id;
//        $response = $this->put('/api/auth/user'.$id,
//            [
//                'caption' => ''
//            ]);
//        var_dump($response->getContent());
//        $this->assertEquals(500, $response->status());
//    }
//
//    public function test_Update_WrongId_Error()
//    {
//        $id = 'wrong';
//        $response = $this->put('/api/auth/user'.$id,
//            [
//                'caption' => 'upd_1'
//            ]);
//        var_dump($response->getContent());
//        $this->assertEquals(500, $response->status());
//    }
//
//    public function test_Get_Successful(){
//
//        $user = MyUser::orderBy('created_at', 'desc')->first();
//        $id = $user -> id;
//        $response = $this->get('/api/user'.$id,
//            [
//                'email' => 'test1@mail.com',
//                'password' => '1afsa111'
//            ]);
//        var_dump($response->getContent());
//        $this->assertEquals(500, $response->status());
//    }
//
//    public function test_Get_WrongId_Error(){
//
//        $id = '';
//        $response = $this->get('/api/user'.$id,
//            [
//
//            ]);
//        var_dump($response->getContent());
//        $this->assertEquals(500, $response->status());
//    }
//
//    public function test_Delete_Successful()
//    {
//        $user = MyUser::orderBy('created_at', 'desc')->first();
//        $id = $user -> id;
//        $response = $this->delete('/api/user/'.$id);
//        var_dump($response->getContent());
//        $this->assertEquals(200, $response->status());
//    }
//
//    public function test_Delete_WrongId_Error()
//    {
//        $id = 'wrong';
//        $response = $this->delete('/api/user/'.$id);
//        var_dump($response->getContent());
//        $this->assertEquals(500, $response->status());
//    }
//
//      public function testTruncated() //for testing only
//      {
//          $response = $this->delete('/api/auth/usr');
//          //var_dump($response->getContent());
//          $this->assertEquals(200, $response->status());
//      }

//    public function test_Login_Seccessful()
//    {
//        $response = $this->post('/api/login',
//            [
//                'email' => 'test@mail.com',
//                'password' => '111111'
//            ]);
//        var_dump($response->getContent());
//        $this->assertEquals(200, $response->status());
//    }

//    public function testMe()
//    {
//        $token = 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2FwaVwvbG9naW4iLCJpYXQiOjE1MzgzOTQ5NDEsImV4cCI6MTUzODM5ODU0MSwibmJmIjoxNTM4Mzk0OTQxLCJqdGkiOiIyM0RtdnZuWjVYdmJjRFM3Iiwic3ViIjoyMSwicHJ2IjoiN2JiMmUwNTYyYTM3NTc0ZWNiOGNmYTE1ZjgyMTkxNjBjNWZjNTFlMCJ9.SfxxmrddQgac7nFtv_YTifmFeFnDIIuOShJKZUeiaD4';
//        $response = $this->withHeaders([
//            'Content-Type' => $this->contentType,
//            'Accept' => $this->accept,
//            'Authorization' => $token,
//        ])->post('/api/auth/me');
//        var_dump($response->getContent());
//        $this->assertEquals(200, $response->status());
//    }
}



//FOR STARTING TESTS USE --- vendor/bin/phpunit !!!
