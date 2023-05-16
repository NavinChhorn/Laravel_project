<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EventController extends Controller
{
    
    public function index()
    {
       $events = Event::all();
       return response()->json(['message'=>true,'data'=>$events],200);
    }

    
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'description'=>'required'
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        $event= Event::create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description')
        ]);
        return response()-> Json(['message'=>true,'data'=>$event],200);
   
    }

    
    public function show(string $id)
    {
        $event = Event::find($id);
        return response()->json(['message'=>true,'data'=>$event],200);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'description'=>'required'
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        $event = Event::find($id);
        $event->update([
            'name'=> $request->input('name'),
            'description'=>$request->input('description')
        ]);
        return response()->json(['message'=>true,'data'=>$event],200);
        
    }

    
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->delete();
        return response()->json(['message'=>true],200);
    }


    public function search( $name){
        $event = Event::where('name','like','%'.$name.'%');
        return $event;
    }

    
}
