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
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $user = Auth::user();
        return response()->json(['data' => $user->notes], 200);
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
            return response()->json(['message'=> 'Success save of the note' ], 201);
        }
        return response()->json(['message'=> 'Don\'t success save of the note' ], 400);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        //Validate form request
        $validator = Validator::make($request->all(),[
            'note'      => 'required',
        ]);
        //Response fail te validation
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        //add attributes of notes
        $note = Auth::user()->notes()->where('id', $id)->first();
        //Validate if the object exists
        if (!is_object($note)){
            return response()->json(['message'=> 'Not exists the note' ], 403);
        }
        $note->note = $request->note;
        //Validate save note
        if ($note->save())
        {
            return response()->json(['message'=> 'Success update of the note' ], 200);
        }
        return response()->json(['message'=> 'Failed update of the note' ], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        //add attributes of notes
        $note = Auth::user()->notes()->where('id', $id)->first();
        //Validate if the object exists
        if (!is_object($note)){
            return response()->json(['message'=> 'Not exists the note' ], 403);
        }
        //Validate save note
        if ($note->delete())
        {
            return response()->json(['message'=> 'Success delete of the note' ], 200);
        }
        return response()->json(['message'=> 'Failed delete of the note' ], 400);
    }
}
