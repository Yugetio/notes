<?php

namespace Tests\Feature;

use Tests\TestCase;
class FolderTest extends TestCase
{
    public function testCreate(){
        $response = $this->post('/folder',
            [
                'title' => 'testuser@mail.com',
                'user_id' => '1',
                'parent_id' => '1'
            ]);
        var_dump($response->getContent());
        $this->assertEquals(200, $response->status());
    }
}
//FOR STARTING TESTS USE --- vendor/bin/phpunit !!!
