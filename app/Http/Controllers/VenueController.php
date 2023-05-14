<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $venues = Venue::all();
        return response()->json(['messae'=>true,'data'=>$venues],200);
    }

    
   
    public function store(Request $request)
    {   $validator = Validator::make($request->all(),[
            'name'=>'required',
            'location'=>'required'
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        $venue = Venue::create([
            'name'=> $request ->input('name'),
            'location'=> $request ->input('location')
        ]);
        return response()->json(['message'=>'create success !','data'=>$venue],200);
    }

   
    public function show(string $id)
    {
       $venue = Venue::find($id);
       return response()->json(['message'=>true,'data'=>$venue],200);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'location'=>'required'
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        $venue = Venue::find($id);
        $venue->update([
            'name'=>$request->input('name'),
            'location'=>$request->input('location')
        ]);
        return response()->json(['message'=>'Update success !','data'=>$venue],200);

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $venue = Venue::find($id);
        $venue->delete();
        return response()->json(['message'=>'delete success !'],200);
    }
}
