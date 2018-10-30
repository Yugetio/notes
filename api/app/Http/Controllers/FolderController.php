<?php

namespace App\Http\Controllers;

use App\Http\MyExceptions\FolderNotFoundException;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FolderController extends MyAbstractClass
{
    public function create(Request $request, $id=Null)
    {
        try {
            $folder = new Folder();
            $folder->user_id = auth()->user()->id;       
            $folder->parent_folder_id = $id;
            $folder->title = $request->input('title');

            $folder->save();
            return new JsonResponse(['message' => 'Folder has created'], 201);
        } catch (\Exception $e) {
            return $this->SendError($e);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $folder = Folder::find($id);
            if (!$folder) {
                throw new FolderNotFoundException();
            }
//null 
            $folder->title = $request->title;
            $folder->save();

            return new JsonResponse(['message'=>'Folder has updated'], 200);

            // return new JsonResponse([
            //     '$request->input(title)' => $request->title,
            //     'folder' => $folder
            // ], 200);
        } catch (\Exception $e) {
            return  $this->SendError($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
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
