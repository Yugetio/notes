<?php


namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\Response;
use App\Models\Folder;

class FolderModelTest extends TestCase
{

    public function test_Save_Successful(){

        $parent_id = 1;
        $title = 'Save_1';

        $model = new Folder();
        $this->assertTrue ($model->setData($parent_id, $title));
    }

    public function test_Save_ExistTitle_Error(){


    }

//    public function test_Load_Successful(){
//

//        $parent_id = 1;
//        $title = 'saveTest';
//
//        $saveModel = new Models\Folder();
//        $saveModel->loadData($parent_id, $title);
//
//        echo '\n'.$saveModel->parent_id;
//
//        $this->assertTrue(true);
//        $this->assertEquals($saveModel->parent_id, $parent_id);
//        $this->assertEquals($saveModel->title, $title);
//    }
//    public function test_Serialize_Successful(){
//      $model = new Models\Folder();
//
//
//    }
}
