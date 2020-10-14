<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    public function register(Request $request){
        $rules = [
            'level_id'   => 'required',
            'name'   => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }
        $office = Services::create($request->all());
        return response()->json(['status' => 'success','offices' => $office], 201);
    }

    public function getservices($level_id){
        $services = Services::where('level_id', $level_id)->get();
        if($services->count() === 0 ){
            return response()->json(['status' => 'error','message' => 'Record not found...'], 404);
        }
        return response()->json(['status' => 'success','services' => $services], 200);
    }
}
