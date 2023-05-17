<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShowEventResource;
use App\Http\Resources\ShowMatchCountryResource;
use App\Http\Resources\ShowTicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TicketController extends Controller
{
    
    public function index()
    {
        $tickets = Ticket::with('zone')->with('match_country')->get();
        return response()->json(['message'=>true,'data'=>$tickets],200);
    }

   
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'zone_id'=>'required',
            'match_country_id'=>'required'
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        $ticket = Ticket::create([
            'zone_id'=>$request->input('zone_id'),
            'match_country_id'=>$request->input('match_country_id')
        ]);
        $ticket = new ShowTicketResource( $ticket);
        return response()->json(['message'=>'Create success !','data'=>$ticket],200);
        
    }

    
    public function show( $id)
    {
        

        $ticket = Ticket::find($id);

        $ticket = new ShowTicketResource( $ticket);
        return response()->json(['message'=>true,'data'=>$ticket],200);
    }

    

  
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'zone_id'=>'required',
            'match_country_id'=>'required'
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        $ticket = Ticket::find($id);
        $ticket->update([
            'zone_id'=>$request->input('zone_id'),
            'match_country_id'=>$request->input('match_country_id')
        ]);
        $ticket = new ShowTicketResource(  $ticket);
        return response()->json(['message'=>'Update success !','data'=>$ticket],200);
    }

    
    public function destroy(string $id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return response()->json(['message'=>'Delete success !']);
    }

    public function booking($eventname){ 
        $tickets= Ticket::all();
        foreach($tickets as $ticket){

           $match_country = new ShowMatchCountryResource($ticket['match_country']) ;
           $event= new ShowEventResource($match_country['match']['event']);
           $name = $event['name'];
       
           if($name===$eventname && $ticket['booking']==0){
             $this ->updateStatus($ticket['id']);
             return response()->json([
                            'message'=>'Booking success !',
                            'ticket'=> $this->show($ticket['id'])
                            ],200);
           }
           
        }
        return response()->json(['message'=>'This event is no ticket anymore !'],200);
        
    }

    public function updateStatus($id){
        $ticket = Ticket::find($id);
        $ticket->update([
            'booking'=>true
        ]);
    }

    public function searchTicket($eventname){

    }
    
}
