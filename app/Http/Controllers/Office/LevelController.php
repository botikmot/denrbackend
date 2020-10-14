<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;
use Illuminate\Support\Facades\Validator;

class LevelController extends Controller
{
    public function register(Request $request){
        $rules = [
            'name'   => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }
        $office = Level::create($request->all());
        return response()->json(['status' => 'success','offices' => $office], 201);
    }

    public function getlevels(){
        return response()->json(Level::get(), 200);
    }

    public function getOffice($level_id){
        $office = Level::with('services', 'services.divisions.sections')->where('id', $level_id)->get();
        return response()->json(['status' => 'success','data' => $office], 200);
    }

}
