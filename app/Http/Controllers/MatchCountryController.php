<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\MatchCountry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class MatchCountryController extends Controller
{
    
    public function index()
    {
        $matchCountry = MatchCountry::with('country')->with('match')->get();
       
        return response()->json(['message'=>'request success','data'=>$matchCountry],200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'match_id'=>"required",
            'country_id'=>"required",
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        $matchcountry = MatchCountry::create([
            'match_id'=>$request->input('match_id'),
            'country_id'=>$request->input('country_id')
        ]);
        return response()->json(['message'=>'Create success !','data'=>$matchcountry],200);
    }

    
    public function show(string $id)
    {
        $matchcountry = MatchCountry::with('match')->with('country')->find($id);
        return response()->json(['message'=>'Create success !','data'=>$matchcountry],200);
    }

    
    

    
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'match_id'=>"required",
            'country_id'=>"required",
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        $matchcountry =  MatchCountry::find($id);
        $matchcountry ->update([
            'match_id'=>$request->input('match_id'),
            'country_id'=>$request->input('country_id')
        ]);
        return response()->json(['message'=>'Update success !','data'=> $matchcountry],200);
    }

    public function destroy(string $id)
    {
        //
        $matchcountry =  MatchCountry::find($id);
        $matchcountry->delete();
        return response()->json(['message'=>'Delete success !']);
    }
}
