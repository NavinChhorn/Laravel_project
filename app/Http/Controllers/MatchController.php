<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matches = Matches::with('match')->get();
        return response()->json(['message'=>true,'data'=>$matches],200);
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'date'=>'required',
            'time'=>'required',
            'event_id'=>'required',
            'venue_id'=>'required'
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        $match = Matches::create([
            'date'=>$request->input('date'),
            'time'=>$request->input('time'),
            'event_id'=>$request->input("event_id"),
            'venue_id'=>$request ->input('venue_id')
        ]);
        return response()->json(['message'=>'create success !','data'=>$match],200);
    }

    
    public function show(string $id)
    {
       
    }

   
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'date'=>'required',
            'time'=>'required',
            'event_id'=>'required',
            'venue_id'=>'required'
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
       $match = Matches::find($id);
       $match->update([
        'date'=>$request->input('date'),
        'time'=>$request->input('time'),
        'event_id'=>$request->input('event_id'),
        'venue_id'=>$request->input('venue_id')
       ]);
       return response()->json(['message'=>'Update success !','data'=>$match],200);

    }

  
    public function destroy(string $id)
    {
        $match = Matches::find($id);
        $match->delete();
        return response()->json(['message'=>'delete succcess !'],200);
    }
}
