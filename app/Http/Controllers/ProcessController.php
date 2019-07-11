<?php

namespace App\Http\Controllers;

use App\Process;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProcess;
use App\Http\Requests\UpdateProcess;
use App\Reception;
use App\Rejected;
use App\Process_Reception;

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
        $receptions = Reception::orderBy('tarja', 'ASC')->where('available', 1)->get();
        $listRejecteds = Rejected::OrderBy('id', 'ASC')->pluck('reason', 'id');

        $last = Process::OrderBy('id', 'DES')->first();
    
        if($last == null){
            $lastid = 1; 

        }else{
            $lastid = $last->id +1;
        }

        return view('process.processes.create', compact('lastid','receptions', 'processeslist','listRejecteds'));
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
 
         //instancio el radio button
         $rejected = $request->get('rejected');
 
         if($rejected==1){
             $rejected = ['process_id' => $request->get('id'), 
             'reason' => $request->get('reason')];
             $rejected = Rejected::create($rejected);
             
         }else{
         }
         
         
         //quitar rate y reason  del array reception
         unset($request['reason']);
         unset($request['comment']);

         //Guarda la Recepción
         $process = Process::create($request->all());

        $process->receptions()->attach($request->get('receptions'));

        $checklistdata = $request->get('receptions');

        foreach ($checklistdata as $key) {
            $cualquiercosa = Reception::where('id', $key)->first();
            Reception::where('id', $key)->update(['available' => 0]);
        }


        return redirect()->route('process.processes.index', $process->id)->with('info', 'Proceso guardado con exito');
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
        $process1 = $process->id;
        // $receptions = Process_Reception::where('process_id',$process1)->get();
        $receptions = Process::find($process1);

        return view('process.processes.show', compact('receptions'));
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
        $receptions = Reception::orderBy('tarja', 'DES')->where('available', 1)->get();
         $listRejecteds = Rejected::OrderBy('id', 'DES')->pluck('reason', 'id');

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
    public function update(UpdateProcess $request,Process $process)
    {
        $process = Process::find($id);
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
