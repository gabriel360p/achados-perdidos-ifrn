<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Categorie::all());
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
            Categorie::create([
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
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        return response()->json($categorie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categorie)
    {
        try {
            $categorie->update([
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
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        try {
            $categorie->delete();

            return response()->json(['status' => 'sucesso']);

        } catch (\Exception $e) {

            return response()->json(['status' => 'erro', 'message'=>$e->getMessage()]);

        }
    }
}
