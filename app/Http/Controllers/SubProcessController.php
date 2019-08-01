<?php

namespace App\Http\Controllers;

use App\SubProcess;
use App\Format;
use App\Quality;
use App\motivorejected;
use App\Process;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SubProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subprocesses = SubProcess::paginate();

        return view('subprocess.index', compact('subprocesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {  

        
        $process = DB::table('process_reception')->where('process_id', $id)->first(); 
        $reception_id = $process->reception_id;
        $reception = DB::table('receptions')->where('id', $reception_id)->first();
        $peso = $reception->grossweight;

        $idsad = $id;

        //formato y peso para la vista
        $listFormat = Format::OrderBy('id', 'DES')->pluck('name','weight');
        $listQualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');
        $listRejecteds = motivorejected::OrderBy('id', 'ASC')->pluck('name', 'id');

        return view('subprocess.create', compact('idsad', 'peso', 'listFormat', 'listQualities', 'listRejecteds'));
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
        
        SubProcess::create($request->all());

        //instancio el radio button
        

        // si se selecciono que estaba rechazado pos, se rechaza xD
       
    }

    /**
     * Display the specified resource.
     *
     * @param \App\SubProcess $subProcess
     *
     * @return \Illuminate\Http\Response
     */
    public function show(SubProcess $subProcess)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\SubProcess $subProcess
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(SubProcess $subProcess)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\SubProcess          $subProcess
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubProcess $subProcess)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\SubProcess $subProcess
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubProcess $subProcess)
    {
    }
}
