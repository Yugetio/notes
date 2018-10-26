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
    public function createNote(Request $request)
    {
        try {
            $note = new Note();
            $note->caption = $request->input('caption');
            $note->text = $request->input('text');
            $note->save();
            return new JsonResponse(['message' => 'Note has created'], 201);
        } catch (\Exception $e) {
            return $this->SendError($e);
        }
    }

    public function updateNote(Request $request, $id)
    {
        try {
            $note = Note::find($id);
            if (!$note) {
                throw new NoteNotFoundException();
            }
            $note->caption = $request->input('caption');
            $note->text = $request->input('text');
            $note->save();
            return new JsonResponse(['message'=>'Note has updated'], 200);
        } catch (\Exception $e) {
            return  $this->SendError($e);
        }
        //Redirect::to('/notes');
    }

    public function deleteNote($id)
    {
        try {
            $note = Note::find($id);
            if (!$note) {
                throw new NoteNotFoundException();
            }
            $note->delete();
            return new JsonResponse(['message'=>'Note has deleted'], 200);
        } catch (\Exception $e) {
            return  $this->SendError($e);
        }
        //Redirect::to('/notes');
    }
}
