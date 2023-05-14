<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $countries = Country::all();
        return response()->json(['message'=>true,"data"=>$countries],200);

    }
   
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
        ]);
        if($validator->fails()){
            return $validator->errors();
        }

        $country = Country::create([
            'name'=> $request -> input('name'),
        ]);

        return response()->json([
            'message'=>true,
            'data'=> $country
        ]);
    }
  
    public function show(string $id)
    {
        $country = Country::find($id);
        return response()->json(['message'=>true,'data'=>$country],200);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        $country = Country::find($id);
        $country->update([
            'name'=>$request->input('name'),
        ]);
        return response()->json(['message'=>true,'data'=>$country],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $country = Country::find($id);
        $country->delete();
        return response()->json(['message'=>true],200);
    
    }
}
