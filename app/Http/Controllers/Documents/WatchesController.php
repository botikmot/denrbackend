<?php

namespace App\Http\Controllers\Documents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Watch;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\WatchCollection;

class WatchesController extends Controller
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
        $check = Watch::where('user_id',$request->user_id)->where('action_id', $request->action_id)->get();
        if($check->count() > 0){
            return response()->json(['status' => 'error','message' => 'duplicate data'], 201);
        }
        $watch = Watch::create($request->all());
        return response()->json(['status' => 'success','data' => $watch], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details = WatchCollection::collection(Watch::with('action','action.document', 'action.actoffice')
                  ->where('user_id', $id)->get());
        return response()->json(['status' => 'success','data' => $details], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Watch::find($id);
        $document->delete();
        return response()->json(['status' => 'success','message' => 'successfully deleted'], 200);
    }
}
