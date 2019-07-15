<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers;
use App\Tray;


class TrayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trays = Tray::Paginate();
   
        return view('admin.trays.index', compact('trays'));
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $tray = Tray::create($request->all());
        return redirect()->route('admin.trays.create', $tray->id)->with('info','Insumo guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\tray $tray
     *
     * @return \Illuminate\Http\Response
     */
    public function show(tray $tray)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\tray $tray
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(tray $tray)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\tray                $tray
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tray $tray)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\TrayController $traycontroller
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(tray $tray)
    {
    }

    
}
