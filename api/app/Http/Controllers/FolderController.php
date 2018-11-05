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

    public function create(Request $request, $idInsertFile, $preFolder, $postFolder){

        try {
            $folder = new Folder();
            $folder->user_id = auth()->user()->id;
            $fileInsertList = [];

            if($idInsertFile){
                array_push($fileInsertList,json_encode($idInsertFile));
            }
            if ($this->checkTitle($request)) {
                throw new FolderNotGetTitleException();
            }

            $folder->title = $request->input('title');
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

    public function createFiles(Request $request, $idFolder, $idInsertFolder){

        try{
           return $this->create($request, $idFolder,  $idInsertFolder);
        }
        catch (\Exception $e) {
            return  $this->SendError($e);
        }
    }

    public function destroy($id){

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
