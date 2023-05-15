<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    
    public function index()
    {
        $tickets = Ticket::with('event')->with('zone')->with('match')->get();
        return response()->json(['message'=>true,'data'=>$tickets],200);
    }

   
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'event_id'=>'required',
            'zone_id'=>'required',
            'match_id'=>'required'
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        $ticket = Ticket::create([
            'event_id'=>$request->input('event_id'),
            'zone_id'=>$request->input('zone_id'),
            'match_id'=>$request->input('match_id')
        ]);
        return response()->json(['message'=>'Create success !','data'=>$ticket],200);
        
    }

    
    public function show(string $id)
    {
        $tickets = Ticket::with('event')->with('zone')->with('match')->find($id);
        return response()->json(['message'=>true,'data'=>$tickets],200);
    }

    

  
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'event_id'=>'required',
            'zone_id'=>'required',
            'match_id'=>'required'
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        $ticket = Ticket::find($id);
        $ticket->update([
            'event_id'=>$request->input('event_id'),
            'zone_id'=>$request->input('zone_id'),
            'match_id'=>$request->input('match_id')
        ]);
        return response()->json(['message'=>'Update success !','data'=>$ticket],200);
    }

    
    public function destroy(string $id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return response()->json(['message'=>'Delete success !']);
    }
}
