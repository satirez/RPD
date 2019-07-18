<?php

namespace App\Http\Controllers;

use App\TrayOut;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrayOutController extends Controller
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
        
        $listProviders = Providers::OrderBy('id', 'DES')->pluck('name', 'id');       
        return view('admin.trays.create', compact ('listProviders'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trayOut = TrayOut::create($request->all());
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\TrayOut  $trayOut
     * @return \Illuminate\Http\Response
     */
    public function show(TrayOut $trayOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TrayOut  $trayOut
     * @return \Illuminate\Http\Response
     */
    public function edit(TrayOut $trayOut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TrayOut  $trayOut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrayOut $trayOut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TrayOut  $trayOut
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrayOut $trayOut)
    {
        //
    }
}
