<?php

namespace App\Http\Controllers;

use App\Models\visas;
use Illuminate\Http\Request;

class VisasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $visas = visas::where('status', 'active')->get();
        return view('admin.visa.index',compact('visas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.visa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\visas  $visas
     * @return \Illuminate\Http\Response
     */
    public function show(visas $visas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\visas  $visas
     * @return \Illuminate\Http\Response
     */
    public function edit(visas $visas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\visas  $visas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, visas $visas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\visas  $visas
     * @return \Illuminate\Http\Response
     */
    public function destroy(visas $visas)
    {
        //
    }
}
