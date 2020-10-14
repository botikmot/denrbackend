<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'position' => 'required',
            'username' => ['required', 'unique:users'],
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);                        
            }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('AppName')->accessToken;
        return response()->json(['success'=>$success], 200);
    }

    public function user(){
        $user = Auth::user();
        $user['user'] = $user;
        return response()->json(['success' => $user], 200);
    }

    public function login(Request $request){
        if(Auth::attempt(['username' => request('username'), 'password' => request('password')])){
            $user = Auth::user();
            //$success['token'] =  $user->createToken($request->username)->accessToken;
            $success['token'] = $user->createToken($request->username)->plainTextToken;
             return response()->json(['success' => $success], 200);
         } else{
            return response()->json(['error'=>'Unauthorised'], 401);
         }
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json(['logout'], 201);
    }

    public function getuserdocuments($id){
        $documents = User::with('document')->where('id', $id)->get();
        return response()->json(['status' => 'success','data' => $documents], 200);
    }

}
