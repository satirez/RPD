<?php

namespace App\Http\Controllers;

use App\Reception;
use App\SubProcess;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class auditoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $rejecteds = SubProcess::where('rejected', 1)->get();
        return view ('auditoria.rejected', compact('rejecteds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all);
        $availableSubProcess = $request->get('rejecteds');

        foreach ($availableSubProcess as $key) {
            $SubProcess = SubProcess::where('id', $key)->first();
            SubProcess::where('id', $key)->update(['rejected' => 0]);
        }
        return redirect()->route('home')->with('info','Pallets actualizados con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
