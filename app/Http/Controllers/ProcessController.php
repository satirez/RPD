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
        $listFormat = Format::OrderBy('id', 'DES')->pluck('name', 'id');
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
       
        // Se genera el array con la información de proceso
       $process = [
            'tarja_proceso' => $request->get('tarja_proceso'), 
            'Box_out' => $request->get('Box_out'),
            'rejected' => $request->get('rejected'),
            'wash' => $request->get('wash')
        ];
        
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

            // SUB PROCESOS
        // se obtienen los array de sub procesos
         $rows = $request->input('row');
         foreach ($rows as $row) {
  
              $Charges[] = [
                  'quantity' =>$row['cantidad'],
                  'format_id' =>$row['formatos'],
                  'quality_id' =>$row['cualidades'],
                  'status_id' =>$row['estatus'],
                  'process_id'=>$process_id
              ];
  
         }
         
         // Se insertan los Subprocesos
         SubProcess::insert($Charges);


         //instancio el radio button
         $rejected = $request->get('rejected');
 
         if($rejected==1){
             $rejected = [
                 'process_id' => $process_id, 
                 'reason' => $request->get('reason'),
                 'comment' => $request->get('comment')];
                 $rejected = Rejected::create($rejected);
             
         }else{
         }
         

        

        return redirect()->route('process.processes.index', $process_id)->with('info', 'Proceso guardado con exito');
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
