<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use Illuminate\Support\Facades\Validator;

class DivisionController extends Controller
{
    public function register(Request $request){
        $rules = [
            'level_id'   => 'required',
            'services_id'   => 'required',
            'name'   => 'required',
            'abbr' => 'required'
         ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }
        $office = Division::create($request->all());
        return response()->json(['status' => 'success','offices' => $office], 201);
    }

    public function getdivisions(Request $request){
        $divisions = Division::where('level_id', $request->level_id)
                              ->where('services_id', $request->services_id)->get();
        if($divisions->count() === 0 ){
            return response()->json(['status' => 'error','message' => 'Record not found...'], 404);
        }
        return response()->json(['status' => 'success','divisions' => $divisions], 200);
    }

    public function getleveldivisions($level_id){
        $divisions = Division::where('level_id', $level_id)->get();
        if($divisions->count() === 0 ){
            return response()->json(['status' => 'error','message' => 'Record not found...'], 404);
        }
        return response()->json(['status' => 'success','divisions' => $divisions], 200);
    }

    public function divisiondocuments(){
        $division = Division::has('actions')->get();
        return response()->json(['status' => 'success','divisions' => $division], 200);
    }
}
