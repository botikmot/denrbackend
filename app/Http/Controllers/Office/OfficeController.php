<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Office;
use Illuminate\Support\Facades\Validator;

class OfficeController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'abbr' => 'required',
            'level_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);                        
            }
        $input = $request->all();
        $office = Office::create($input);
        return response()->json(['offices'=>$office], 200);
    }

    public function getUser($office_id){
        $office = Office::with('user')->where('id', $office_id)->get();
        return response()->json(['status' => 'success','data' => $office], 200);
    }


}
