<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class placeController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        return response()->json(Place::all());
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
    {//ok
        try {
            place::create([
                'name'=>$request->name,
            ]);

            return response()->json(['status' => 'sucesso']);

        } catch (\Exception $e) {

            return response()->json(['status' => 'erro', 'message'=>$e->getMessage()]);

        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        return response()->json($place);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        try {
            $place->update([
                'name'=>$request->name,
            ]);

            return response()->json(['status' => 'sucesso']);

        } catch (\Exception $e) {

            return response()->json(['status' => 'erro', 'message'=>$e->getMessage()]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        try {
            $place->delete();

            return response()->json(['status' => 'sucesso']);

        } catch (\Exception $e) {

            return response()->json(['status' => 'erro', 'message'=>$e->getMessage()]);

        }
    }
}
