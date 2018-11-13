<?php

namespace Tests\Feature;

use App\Http\Controllers\FolderController;
use Tests\TestCase;
class FolderTest extends TestCase
{

    public function test_Full_Create(){
        $id = 1;
        $response = $this->post('/api/auth/folder/'.$id,
            [
                'title' => 'Folder_5',
            ]);
        var_dump($response->getContent());
        $this->assertEquals(201, $response->status());
    }

    public function test_Create_Successful(){
        $id = 1;
        $response = $this->post('/api/auth/folder/'.$id,
            [
                'title' => 'Folder_5',
            ]);
        var_dump($response->getContent());
        $this->assertEquals(201, $response->status());
    }

    public function test_Create_EmptyTitle_Error(){

        $id = 1;
        $response = $this->post('/api/auth/folder/'.$id,
            [
                'title' => '',
            ]);
        var_dump($response->getContent());
        $this->assertEquals(500, $response->status());
    }
    public function test_Create_AlreadyExist_Error(){

        $id = 1;
        $response = $this->post('/api/auth/folder/'.$id,
            [
                'title' => 'Folder_5',
            ]);
        var_dump($response->getContent());
        $this->assertEquals(500, $response->status());
    }
    public function test_Create_WrongId_Error(){

        $id ='';
        $response = $this->post('/api/auth/folder/'.$id,
            [
                'title' => 'Folder_5',
            ]);
        var_dump($response->getContent());
        $this->assertEquals(404, $response->status());
    }

    public function test_Update_Successful()
    {
        $response = $this->put('/api/auth/folder/1',
            [
                'title' => 'Upd_1 '
            ]);

        var_dump($response->Content());
        $this->assertEquals(200, $response->status());
    }
    public function test_Update_EmptyTitle_Error()
    {
        $response = $this->put('/api/auth/folder/1',
            [
                'title' => ''
            ]);

        var_dump($response->Content());
        $this->assertEquals(500, $response->status());
    }
    public function test_Update_TitleExist_Error()
    {
        $response = $this->put('/api/auth/folder/1',
            [
                'title' => 'Upd_1 '
            ]);

        var_dump($response->Content());
        $this->assertEquals(500, $response->status());
    }

    public function test_Get_Successful(){
        $id=1;
        $response = $this->get('/api/auth/folder/'.$id,
            [

            ]);

        var_dump($response->getContent());
        $this->assertEquals(200, $response->status());
    }

    public function testDelete()
    {
        $response = $this->delete('/api/auth/folder/1');

        var_dump($response->getContent());
        $this->assertEquals(200, $response->status());
    }
}
//FOR STARTING TESTS USE --- vendor/bin/phpunit !!!
