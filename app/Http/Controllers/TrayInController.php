<?php

namespace App\Http\Controllers;

use App\TrayIn;
use App\TrayOut;
use App\Providers;
use App\TrayIn_TrayOut;
use Illuminate\Http\Request;

class TrayInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $liststocks = TrayIn::all();
       
        $traysOut = TrayOut::get()->sum('traysout');
        $traysIn = TrayIn::get()->sum('traysin');

        $stockbandejas = $traysIn - $traysOut;

        $listProviders = Providers::OrderBy('id', 'DES')->pluck('name', 'id');

        return view('admin.trays.create', compact('listProviders', 'stockbandejas', 'liststocks'));
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
        $menos = ($request->get('traysout')*-1);

        
        //datos sacados pasados a un array
        $traysout = ['provider_id' => $request->get('provider_id'), 
                     'traysout' => $request->get('traysout')];

        //guarda un $traysout
        $traysout = TrayOut::create($traysout);
        //saca los datos del array!
        
        unset($request['traysout']);

        $trayIn = TrayIn::create($request->all());

        return redirect()->route('admin.trays.create', $trayIn->id)->with('info', 'Ingreso exitoso');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\TrayIn $trayIn
     *
     * @return \Illuminate\Http\Response
     */
    public function show(TrayIn $trayIn)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\TrayIn $trayIn
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(TrayIn $trayIn)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\TrayIn              $trayIn
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrayIn $trayIn)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\TrayIn $trayIn
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrayIn $trayIn)
    {
    }
}
