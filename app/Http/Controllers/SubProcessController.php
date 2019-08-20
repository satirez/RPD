<?php

namespace App\Http\Controllers;

use App\Format;
use App\SubProcess;
use App\Process;
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
        $subprocesses = SubProcess::paginate(50);

        return view('subprocess.index', compact('subprocesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $process = DB::table('process__receptions')->where('process_id', $id)->first();
        $processId = $process->process_id;
        $reception_id = $process->reception_id;
        $reception = DB::table('receptions')->where('id', $reception_id)->first();

        $peso = $reception->grossweight;
        $acumWeight = SubProcess::where('process_id', $processId)->sum('weight');
        $resto = 0;

        $idsad = $id;
        $subprocesses = SubProcess::where('process_id', $processId)->paginate();

        //formato y peso para la vista
        $listFormat = Format::OrderBy('id', 'DES')->pluck('name', 'weight');
        $listQualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');
        $listRejecteds = motivorejected::OrderBy('id', 'ASC')->pluck('name', 'id');

        return view('subprocess.create', compact('idsad', 'peso', 'listFormat', 'listQualities', 'listRejecteds', 'acumWeight', 'resto', 'subprocesses'));
    }

    public function getData()
    {
        return Datatables::of(SubProcess::query())->make(true);
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
        //validacion y desactivacion de un proceso
        if($request->format_id === "1.000"){
               
            SubProcess::create($request->all());

            $key = $request->get('process_id');

            Process::where('id', $key)->update(['available' => 0]);
            return redirect()->route('process.processes.index')->with('info', 'Proceso finalizado con exito');

        }else{
            //query pa pasar el peso de formato y sacarle su id y validar lo que se ha usado

            $getFormatId = $request->get('format_id');
            $idProcess = $request->get('process_id');

            $idFormat = Format::where('weight', $getFormatId)->first()->id;
            $request['format_id'] = $idFormat;

            SubProcess::create($request->all());

            $listFormat = Format::OrderBy('id', 'DES')->pluck('name', 'weight');
            $listQualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');
            $listRejecteds = motivorejected::OrderBy('id', 'ASC')->pluck('name', 'id');

            $process = DB::table('process__receptions')->where('process_id', $idProcess)->first();

            $reception_id = $process->reception_id;
            $reception = DB::table('receptions')->where('id', $reception_id)->first();
            $peso = $reception->grossweight;
            $idsad = $idProcess;
            //sumas y restas
            $acumWeight = SubProcess::where('process_id', $idProcess)->sum('weight');
            $resto = $peso - $acumWeight;

            return redirect()->route('subprocess.create', $idProcess)->with('info', 'Temprada guardado con exito');
        }

            

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
