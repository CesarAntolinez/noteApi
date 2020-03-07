<?php

namespace App\Http\Controllers\API;

use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Note[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index(Request $request)
    {
        return Note::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //Validate form request
        $validator = Validator::make($request->all(), [
            'note'      => 'required',
        ]);
        //Response fail te validation
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        //add attributes of notes
        $note = new Note($request->all());
        $note->user_id = Auth::id();
        //Validate save note
        if ($note->save())
        {
            return response()->json(['message'=> 'Success save of the note' ], 200);
        }
        return response()->json(['message'=> 'Success save of the note' ], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
