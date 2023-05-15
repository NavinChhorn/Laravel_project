<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zone = Zone::with('venue')->get();
        return response()->json(['message'=>'request success !','data'=>$zone],200);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'venue_id'=>'required'
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        $zone = Zone::create([
            'name'=>$request->input('name'),
            'venue_id'=>$request->input('venue_id')
        ]);
        return response()->json(['message'=>'create success !','data'=>$zone],200);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $zone = Zone::with('venue')->find($id);
        return response()->json(['message'=>'request success !','data'=>$zone],200);
        
    }

    
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'venue_id'=>'required'
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        $zone = Zone::find($id);
        $zone->update([
            'name'=>$request ->input('name'),
            'venue_id'=>$request ->input('venue_id')
        ]);
        return response()->json(['message'=>'Update success !','data'=>$zone],200);
    }


    public function destroy(string $id)
    {
        $zone = Zone::find($id);
        $zone->delete();
        return response()->json(['message'=>'Deleted !'],200);
    }
}
