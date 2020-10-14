<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{
    public function register(Request $request){
        $rules = [
            'level_id'   => 'required',
            'services_id'   => 'required',
            'division_id'   => 'required',
            'name'   => 'required',
            'abbr' => 'required'
         ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }
        $office = Section::create($request->all());
        return response()->json(['status' => 'success','offices' => $office], 201);
    }

    public function getlevelsections($level_id){
        $sections = Section::where('level_id', $level_id)->get();
        if($sections->count() === 0 ){
            return response()->json(['status' => 'error','message' => 'Record not found...'], 404);
        }
        return response()->json(['status' => 'success','sections' => $sections], 200);
    }
}
