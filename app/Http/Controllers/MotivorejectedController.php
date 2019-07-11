<?php

namespace App\Http\Controllers;

use App\motivorejected;
use Illuminate\Http\Request;

class MotivorejectedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motivorejecteds = motivorejected::paginate();

        return view('admin.rejecteds.index', compact('motivorejecteds'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('admin.rejecteds.create');
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
        $motivorejected = motivorejected::create($request->all());
        
        return redirect()->route('admin.rejecteds.index', $motivorejected->id)->with('info','Tipo de fruta guardada con exito'); 
    }

    /**
     * Display the specified resource.
     *
     * @param \App\motivorejected $motivorejected
     *
     * @return \Illuminate\Http\Response
     */
    public function show(motivorejected $motivorejected)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\motivorejected $motivorejected
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(motivorejected $motivorejected)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\motivorejected      $motivorejected
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, motivorejected $motivorejected)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\motivorejected $motivorejected
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(motivorejected $motivorejected)
    {
    }
}
