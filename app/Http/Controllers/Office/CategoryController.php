<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function register(Request $request){
        $rules = [
            'level_id'   => 'required',
            'services_id'   => 'required',
            'name'   => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }
        $office = Category::create($request->all());
        return response()->json(['status' => 'success','offices' => $office], 201);
    }
}
