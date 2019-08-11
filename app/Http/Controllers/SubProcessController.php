<?php

namespace App\Http\Controllers;

use App\Format;
use App\SubProcess;
use App\Quality;
use App\motivorejected;
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
        $acumWeight = SubProcess::get()->sum('weight');
        $resto = 0;

        $idsad = $id;

        //formato y peso para la vista
        $listFormat = Format::OrderBy('id', 'DES')->pluck('name', 'weight');
        $listQualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');
        $listRejecteds = motivorejected::OrderBy('id', 'ASC')->pluck('name', 'id');

        return view('subprocess.create', compact('idsad', 'peso', 'listFormat', 'listQualities', 'listRejecteds', 'acumWeight', 'resto'));
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
        //query pa pasar el peso de formato y sacarle su id

        $getFormatId = $request->get('format_id');
        $idProcess = $request->get('process_id');

        $idFormat = Format::where('weight', $getFormatId)->first()->id;
        $request['format_id'] = $idFormat;

        SubProcess::create($request->all());

        $listFormat = Format::OrderBy('id', 'DES')->pluck('name', 'weight');
        $listQualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');
        $listRejecteds = motivorejected::OrderBy('id', 'ASC')->pluck('name', 'id');

        $process = DB::table('process_reception')->where('process_id', $idProcess)->first();
        $reception_id = $process->reception_id;
        $reception = DB::table('receptions')->where('id', $reception_id)->first();
        $peso = $reception->grossweight;
        $idsad = $idProcess;
        //sumas y restas
        $acumWeight = SubProcess::where('process_id', $idProcess)->sum('weight');
        $resto = $peso - $acumWeight;

        return redirect()->route('subprocess.create', $idProcess)->with('info', 'Temprada guardado con exito');
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
        dd($subProcess->all());

        return view('subprocess.edit', compact('subProcess'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\SubProcess          $subProcess
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubProcess $subprocess)
    {
        $subprocess->update($request->all());

        return redirect()->route('subprocess.index', $subprocess->id)->with('info', 'Insumo actualizado con exito');
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
