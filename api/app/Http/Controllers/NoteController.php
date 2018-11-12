<?php

namespace App\Http\Controllers;

use App\Http\MyExceptions\NoteNotFoundException;
use App\Models\Note;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use \Exception;
use \App\Http\MyExceptions\UserNotFoundException;


class NoteController extends MyAbstractClass
{
    public function create(Request $request, $parent_id)
    {
        try {
            $note = new Note();
            $note->caption = $request->input('caption');
            $note->text = $request->input('text');

            if ($parent_id){
                $note->parent_id= $parent_id;
            } else {
                $note->parent_id=null;
            }

            $note->user_id = $request->input('user_id');
            $note->save();
            return new JsonResponse(['message' => 'Note has created'], 201);
        } catch (\Exception $e) {
            return $this->SendError($e);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $note = Note::find($id);

            $note->caption = $request->input('caption');
            $note->text = $request->input('text');
            $note->save();
            return new JsonResponse(['message'=>'Note has updated'], 200);
        } catch (\Exception $e) {
            return  $this->SendError($e);
        }
        //Redirect::to('/notes');
    }
    public function get(){

        try{
            $folder = Note::find($id);
            $folderData = [
                $folder->title, $folder->id, $folder->parent_id
            ];

            $subnotes = Note::find($id)->notes;
            $response = $this->prepareGetDataForResponse($subnotes);

            return new JsonResponse(['message'=>'Folder has sended', $response, $folderData], 200);
        }catch (\Exception $e) {
            return  $this->SendError($e);
        }
    }
    public function delete($id)
    {
        try {
            $note = Note::find($id);

            $note->delete();
            return new JsonResponse(['message'=>'Note has deleted'], 200);
        } catch (\Exception $e) {
            return  $this->SendError($e);
        }
        //Redirect::to('/notes');
    }

    protected function prepareGetDataForResponse($subnotes){
        $titleList = array();
        $idList = array();

        for ($i=0; $i < count($subnotes); $i++){
            array_push($idList,$subnotes[$i]->id);
            array_push($titleList, $subnotes[$i]->caption);
            array_push($textList, $subnotes[$i]->text);
        }
        return array_merge($titleList,$idList,$textList);

    }
}
