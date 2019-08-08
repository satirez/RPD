<?php

namespace App\Http\Controllers;

use App\TipoProductoDispatch;
use Illuminate\Http\Request;


class TipoProductoDispatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoproductodispatches = TipoProductoDispatch::paginate();
        return view('admin.tipoproductodispatches.index', compact('tipoproductodispatches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tipoproductodispatches.create');
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
        $tipoproductodispatch = TipoProductoDispatch::create($request->all());
        return redirect()->route('admin.tipoproductodispatches.index', $tipoproductodispatch->id)->with('info', 'tipo de producto a despachar guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\TipoProductoDispatch $tipoproductodispatch
     *
     * @return \Illuminate\Http\Response
     */
    public function show(TipoProductoDispatch $tipoproductodispatch)
    {
        return view('admin.tipoproductodispatches.show', compact('tipoproductodispatch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\TipoProductoDispatch $tipoproductodispatch
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoProductoDispatch $tipoproductodispatch)
    {
        return view('admin.tipoproductodispatches.edit', compact('tipoproductodispatch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\TipoProductoDispatch              $tipoproductodispatch
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoProductoDispatch $tipoproductodispatch)
    {
        $tipoproductodispatch->update($request->all());

        return redirect()->route('admin.tipoproductodispatches.index', $tipoproductodispatch->id)->with('info', 'etipoproductodispatch actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\TipoProductoDispatch $tipotransporte
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoProductoDispatch $tipotransporte)
    {
        $tipotransporte->delete();

        return back()->with('info', 'estatus eliminado con exito');
    }
}
