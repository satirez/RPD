<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exporter;
use App\SubProcess;
use App\Dispatch;
use App\Rejected;
use App\Fruit;
use App\Lote;
use App\Quality;
use App\Format;
use App\TipoDispatch;
use App\Season;
use App\TipoTransporte;
use App\TipoProductoDispatch;


class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lotes = Lote::paginate();
        return view('lotes.index', compact('lotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
               //lista de tabla pivote en despacho (checkbox)
               $lotes = Lote::paginate();
               $subprocesses = SubProcess::orderBy('id', 'DES')->where('available', 1)->get();
               $listexporter = Exporter::OrderBy('id', 'DES')->pluck('name', 'id');
               $listRejecteds = Rejected::OrderBy('id', 'ASC')->pluck('reason', 'id');
               $listtipodispatch = TipoDispatch::OrderBy('id', 'ASC')->pluck('name', 'id');
               $listFormat = Format::OrderBy('id', 'DES')->pluck('name', 'id', 'weight');
               $listFruits = Fruit::OrderBy('id', 'DES')->pluck('specie', 'id');
               $listQualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');
               $listSeasons = Season::OrderBy('id', 'DES')->pluck('name', 'id');
               $listTipoTransporte = TipoTransporte::OrderBy('id', 'DES')->pluck('name', 'id');
               $listTipoProductoDispatch = TipoProductoDispatch::OrderBy('id', 'DES')->pluck('name', 'id');
       
               return view('lotes.create', compact('listexporter', 'subprocesses', 'listRejecteds', 'listtipodispatch', 'listFormat', 'listFruits', 'listQualities', 'listSeasons', 'listTipoTransporte', 'listTipoProductoDispatch', 'lotes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $lote = Lote::create($request->all());
        
        return redirect()->route('lotes.index', $lote->id)->with('info','Lote guardado con exito'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lote $lote)
    {
       return view('lotes.show', compact('lote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lote $lote)
    {
        return view('lotes.edit', compact('lote'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lote $lote)
    {
         $lote->update($request->all()); 
        return redirect()->route('lotes.index', $lote->id)->with('info', 'Lote actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lote $lote)
    {
        $lote->delete();
        return back()->with('info', 'Eliminado con exito'); 
    }
}
