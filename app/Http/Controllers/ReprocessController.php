<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reprocess;
use App\Process;
use App\Reception;
use App\Lote;
use App\SubProcess;

class ReprocessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countSubProcess = SubProcess::where('id')->count();
        $reprocesses = Reprocess::paginate(100);

        return view('reprocess.reprocesses.index', compact('reprocesses', 'countSubProcess'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $processeslist = Process::paginate();

        $lotes = Lote::orderBy('id', 'DES')->where('available', 1)->paginate(10);

        $subprocesses = SubProcess::orderBy('id', 'DES')->where('available', 1)->where('format_id', '!=', 5)->where('rejected', 0)->paginate(10);

        $last = Reprocess::OrderBy('id', 'DES')->first();

        if ($last == null) {
            $lastid = 1;
        } else {
            $lastid = $last->id + 1;
        }

        return view('reprocess.reprocesses.create', compact('lastid', 'lotes', 'subprocesses'));
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
        if ($request->get('lotes')) { //el codigo del else hace lo mismo pero con subprocess

            $id = $request->get('lotes');

            $fruit_id = Lote::where('id', $id)->first()->fruit_id;
            $quality_id = Lote::where('id', $id)->first()->quality_id;
            $variety_id = Lote::where('id', $id)->first()->variety_id;
            $status_id = Lote::where('id', $id)->first()->status_id;

            $reprocess = [
                'tarja_reproceso' => $request->get('tarja_reproceso'),
                'wash' => $request->get('wash'),
                'variety_id' => $variety_id,
                'quality_id' => $quality_id,
                'fruit_id' => $fruit_id,
                'status_id' => $status_id,
                'tarja_reproceso' => $request->get('tarja_reproceso'),
            ];

            $reprocess = Reprocess::create($reprocess);
            //se establece la relacion con lotes y su tabla Pivote lote_reprocess
            $reprocess->lotes()->attach($request->get('lotes'));
            //se obtiene el id del reproceso que se creó
            $reprocess_id = $reprocess->id;
            //se obtienen todas los lotes para crear un update de las recepciones que no estaran disponibles
            $checklistdata = $request->get('lotes');

            foreach ($checklistdata as $key) {
                $cualquiercosa = Reception::where('id', $key)->first();
                Reception::where('id', $key)->update(['available' => 0]);
            }
            $identificador = 'l';

            return redirect()->route('subreprocess.create', [$reprocess_id, $identificador])->with('success', 'Re Proceso iniciado con éxito');
        } else {

            $id = $request->get('subprocess');

            $fruit_id = SubProcess::where('id', $id)->first()->fruit_id;
            $quality_id = SubProcess::where('id', $id)->first()->quality_id;
            $variety_id = SubProcess::where('id', $id)->first()->variety_id;
            $status_id = SubProcess::where('id', $id)->first()->status_id;

            $reprocess = [
                'tarja_reproceso' => $request->get('tarja_reproceso'),
                'wash' => $request->get('wash'),
                'variety_id' => $variety_id,
                'quality_id' => $quality_id,
                'fruit_id' => $fruit_id,
                'status_id' => $status_id,
            ];
  
            $reprocess = Reprocess::create($reprocess);
            //se establece la relacion con lotes y su tabla Pivote reprocess_subprocess
            $reprocess->subprocess()->attach($request->get('subprocess'));
            //se obtiene el id del reproceso que se creó
            $reprocess_id = $reprocess->id;
            //se obtienen todas los Subprocess para crear un update de los Subprocess que no estaran disponibles
            $checklistdata = $request->get('subprocess');

            foreach ($checklistdata as $key) {
                $cualquiercosa = SubProcess::where('id', $key)->first();
                SubProcess::where('id', $key)->update(['available' => 0]);
            }
            $identificador = 's';

            return redirect()->route('subreprocess.create', [$reprocess_id, $identificador])->with('success', 'Re Proceso iniciado con éxito');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function search($id, $modelo, $request)
    {
    }
}
