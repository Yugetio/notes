<?php

namespace Tests\Feature;

use Tests\TestCase;



class NoteTest extends TestCase
{
    public function test_Create_Successful()
    {
        $id = 1;
        $response = $this->post('/api/auth/note/'.$id,
            [
                'caption' => 'test_2',
                'text' => '12-50-12-11-2018'
            ]);
        //var_dump($response->content());
        $this->assertEquals(201, $response->status());
    }

    public function test_Create_EmptyCaption_Error()
    {
        $id = 1;
        $response = $this->post('/api/auth/note/'.$id,
            [
                'caption' => '',
                'text' => '12-50-12-11-2018'
            ]);
        //var_dump($response->content());
        $this->assertEquals(500, $response->status());
    }

    public function test_Create_WrongId_Error()
    {
        $id = 'wrong';
        $response = $this->post('/api/auth/note/'.$id,
            [
                'caption' => 'test1',
                'text' => '12-50-12-11-2018'
            ]);
        //var_dump($response->content());
        $this->assertEquals(500, $response->status());
    }

    public function test_Update_Successful()
    {
        $id = '5beea28c5fe2980027419632';
        $response = $this->put('/api/auth/note/'.$id,
            [
                'caption' => 'Upd_2',
                'text' => 'Text upd_2'
            ]);
        //var_dump($response->Content());
        $this->assertEquals(200, $response->status());
    }

    public function test_Update_EmptyCaption_Error()
    {
        $id = '5be2f9725fe29800882a00d2';
        $response = $this->put('/api/auth/note/'.$id,
            [
                'caption' => '',
                'text' => 'Text upd_2'
            ]);
        //var_dump($response->Content());
        $this->assertEquals(500, $response->status());
    }

    public function test_Update_WrongId_Error()
    {
        $id = 'wrong';
        $response = $this->put('/api/auth/note/'.$id,
            [
                'caption' => 'Upd_2',
                'text' => 'Text upd_2'
            ]);
        //var_dump($response->Content());
        $this->assertEquals(500, $response->status());
    }

    public function test_Get_Successful(){

        $id = '5beea28c5fe2980027419632';
        $response = $this->get('/api/auth/note/'.$id,
            [

            ]);
        //var_dump($response->getContent());
        $this->assertEquals(200, $response->status());
    }

    public function test_Get_WrongId_Error(){

        $id = 'wrong';
        $response = $this->get('/api/auth/note/'.$id,
            [

            ]);
        //var_dump($response->getContent());
        $this->assertEquals(500, $response->status());
    }

    public function test_Delete_Successful()
    {
        $id = '5bee951a5fe298001824a8b2';
        $response = $this->delete('/api/auth/note/'.$id);

        //var_dump($response->getContent());
        $this->assertEquals(200, $response->status());
    }

    public function test_Delete_WrongId_Error()
    {
        $id = '5beea28c5fe2980027419632';
        $response = $this->delete('/api/auth/note/'.$id);

       // var_dump($response->getContent());
        $this->assertEquals(500, $response->status());
    }

    public function testTruncated()
    {
        $id = '5beea28c5fe2980027419632';
        $response = $this->delete('/api/auth/note'.$id);

        //var_dump($response->getContent());
        $this->assertEquals(200, $response->status());
    }
}

//FOR STARTING TESTS USE --- vendor/bin/phpunit !!!
