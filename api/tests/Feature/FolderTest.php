<?php

namespace Tests\Feature;

use App\Http\Controllers\FolderController;
use Tests\TestCase;
class FolderTest extends TestCase
{

    public function testCreate(){

        $response = $this->post('/api/auth/folder/1',
            [
                'title' => 'Folder_5',
                'user_id' => '1',
            ]);
        var_dump($response->getContent());
        $this->assertEquals(201, $response->status());
    }

    public function testUpdate()
    {
        $response = $this->put('/api/auth/folder/1',
            [
                'title' => 'Upd_1 '
            ]);

        var_dump($response->Content());
        $this->assertEquals(200, $response->status());
    }

    public function testGet(){
        $response = $this->get('/api/auth/folder/1',
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
