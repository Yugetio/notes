<?php

namespace App\Http\Controllers;

use App\Http\MyExceptions\FolderNotFoundException;
use App\Http\MyExceptions\FolderParentNotFoundException;
use App\Http\MyExceptions\FolderNotGetTitleException;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FolderController extends MyAbstractClass{

    protected function checkTitle(Request $request)
    {
        if ($request->title) {
            return false;
        }
        return true;
    }

    public function create(Request $request){

        try {
            $folder = new Folder();
            $folder->user_id = auth()->user()->id;
            $folder->title = $request->input('title');
            $folder->user_id = $request->input('user_id');
            $folder->parent_id= $request->input('parent_id');
            $folder->save();
            return new JsonResponse(['message' => 'Folder has created'], 201);
        } catch (\Exception $e) {
            return $this->SendError($e);
        }
    }

    public function update(Request $request, $id){

        try {
            $folder = Folder::find($id);

            if (!$folder) {
                throw new FolderNotFoundException();
            }

            if ($this->checkTitle($request)) {
                throw new FolderNotGetTitleException();
            }

            $folder->title = $request->title;
            $folder->save();
            return new JsonResponse(['message'=>'Folder has updated'], 200);
        } catch (\Exception $e) {
            return  $this->SendError($e);
        }
    }

    public function get($id){

    }

    public function deleted($id){

        try {
            $folder = Folder::find($id);

            if (!$folder) {
                throw new FolderNotFoundException();
            }

            $folder->delete();
            return new JsonResponse(['message'=>'Folder has deleted'], 200);
        } catch (\Exception $e) {
            return  $this->SendError($e);
        }
    }
}
