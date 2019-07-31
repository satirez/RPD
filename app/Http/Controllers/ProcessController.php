<?php

namespace App\Http\Controllers;

use App\Process;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProcess;
use App\Http\Requests\UpdateProcess;
use App\Reception;
use App\Rejected;
use App\Fruit;
use App\Quality;
use App\Season;
use App\Status;
use App\Format;
use App\Process_Reception;
use App\SubProcess;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processes = Process::paginate();

        return view('process.processes.index', compact('processes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $processeslist = Process::paginate();
        $listFruits = Fruit::OrderBy('id', 'DES')->pluck('specie', 'id');
        $receptions = Reception::orderBy('tarja', 'ASC')->where('available', 1)->get();
        $listRejecteds = Rejected::OrderBy('id', 'ASC')->pluck('reason', 'id');

        $listQualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');
        $listFormat = Format::OrderBy('id', 'DES')->pluck('name','id','weight');
        $listStatus = Status::OrderBy('id', 'DES')->pluck('name', 'id');
        $last = Process::OrderBy('id', 'DES')->first();
    
        
        if($last == null){
            $lastid = 1; 

        }else{
            $lastid = $last->id +1;
        }

        return view('process.processes.create', compact('lastid','receptions','processeslist',
        'listRejecteds','listFruits'
        ,'listQualities','listFormat','listStatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProcess $request)
    {   
       
        //dd($request->input('row'));

        // Se genera el array con la información de proceso
       $process = [
            'tarja_proceso' => $request->get('tarja_proceso'), 
            'rejected' => $request->get('rejected'),
            'wash' => $request->get('wash')
        ];
        

        //dd($process);

        // Se crea
        $process = Process::create($process);
        //se establece la relación con receptions
        $process->receptions()->attach($request->get('receptions'));

        //se obtiene el id del ultimo
        $process_id = $process->id;

        //se obtienen todas las recepciones para crear un update de las recepciones que no estaran disponibles
        $checklistdata = $request->get('receptions');

        foreach ($checklistdata as $key) {
            $cualquiercosa = Reception::where('id', $key)->first();
            Reception::where('id', $key)->update(['available' => 0]);
        }

        return redirect()->route('subprocess.create', $process_id)->with('success', 'Proceso guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Process $process
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Process $process)
    {
        
        // $receptions = Process_Reception::where('process_id',$process1)->get();
        $receptions = Process::find($process);
        $subprocess = SubProcess::where('process_id',$process->id)->get();

        return view('process.processes.show', compact('receptions','subprocess'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Process $process
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Process $process)
    {

        $processeslist = Process::paginate();
        $receptions = Reception::orderBy('tarja', 'ASC')->where('available', 1)->get();
        $listRejecteds = Rejected::OrderBy('id', 'ASC')->pluck('reason', 'id');

        return view('process.processes.edit', compact('process', 'receptions','listRejecteds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Process             $process
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Process $process)
    {
        $process = Process::find($process->id);
        $process->update($request->all());
        $process->receptions()->sync($request->get('receptions'));

        return redirect()->route('process.processes.index', $process->id)->with('info', 'procesos actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Process $process
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Process $process)
    {
        $process->delete();

        return back()->with('info', 'Eliminado con exito');
    }

    ///////////////////////////////////////funciones/////////////
}
