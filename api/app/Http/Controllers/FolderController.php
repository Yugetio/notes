<?php

namespace App\Http\Controllers;

use App\Http\MyExceptions\FolderNotFoundException;
use App\Http\MyExceptions\FolderParentNotFoundException;
use App\Http\MyExceptions\FolderNotGetTitleException;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FolderController extends Controller {

    protected function checkTitle(Request $request)
    {
        if ($request->title) {
            return false;
        }
        return true;
    }

    public function create(Request $request, $parent_id){

        try {
            $folder = new Folder();
            $folder->user_id = $request->input('user_id');
            $folder->title = $request->input('title');

            if ($parent_id){
                $folder->parent_id = $parent_id;
            } else {
                $folder->parent_id = null;
            }

            $folder->save();
            return new JsonResponse(['message' => 'Folder has created'], 200);
        } catch (\Exception $e) {
            return $this->SendError($e);
        }
    }

    public function update(Request $request, $id){

        try {
            $folder = Folder::find($id);

            $folder->title = $request->title;
            $folder->save();

            return new JsonResponse(['message'=>'Folder has updated'], 200);
        } catch (\Exception $e) {
            return  $this->SendError($e);
        }
    }

    public function get($id){

        try{
            $folder = Folder::find($id);
            $folderDataSend = [
              $folder->title, $folder->id, $folder->parent_id
            ];
            // var_dump($folderDataSend);
            return new JsonResponse(['message'=>'Folder has output',$folderDataSend ], 200);
        }catch (\Exception $e) {
            return  $this->SendError($e);
        }
    }

    public function deleted($id){

        try {
            $folder = Folder::find($id);

            $folder->delete();
            return new JsonResponse(['message'=>'Folder has deleted'], 200);
        } catch (\Exception $e) {
            return  $this->SendError($e);
        }
    }
    public static function SendError(\Exception $e) {

        return new JsonResponse($e->getMessage(), $e->getCode());
    }
}
