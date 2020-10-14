<?php

namespace App\Http\Controllers\Documents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Action;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ActionCollection;

class ActionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'document_id' => 'required',
            'user_id' => 'required',
            'office_id' => 'required',
            'action_office' => 'required',
            'is_division' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);                        
            }
        $input = $request->all();
        $action = Action::create($input);
        return response()->json(['actions'=>$action], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $action = ActionCollection::collection(Action::with('document', 'division','user')
                ->where('action_office', $id)
                ->orderBy('updated_at', 'desc')->get());
        return response()->json(['status' => 'success','data' => $action], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        date_default_timezone_set('Asia/Manila');
        $received = Action::where('document_id', $id)->first();
        $received->is_received = date("Y-m-d H:i:s");
        $received->save();
        return response()->json(['status' => 'success','received' => $received], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $action = Action::where('document_id', $id)->first();
        $action->update($request->all());
        return response()->json(['status' => 'success','action' => $action], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
