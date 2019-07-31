<?php

namespace App\Http\Controllers;

use App\SubProcess;

use Illuminate\Support\Facades\DB;
use App\Process;
use App\Process_Reception;
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
        return view('subprocess.create', compact('idsad','peso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        
        // si se selecciono que estaba rechazado pos, se rechaza xD
        if($rejected==1){
            $rejected = [
                'process_id' => $process_id, 
                'reason' => $request->get('reason'),
                'comment' => $request->get('comment')];
                $rejected = Rejected::create($rejected);
            
        }else{
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubProcess  $subProcess
     * @return \Illuminate\Http\Response
     */
    public function show(SubProcess $subProcess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubProcess  $subProcess
     * @return \Illuminate\Http\Response
     */
    public function edit(SubProcess $subProcess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubProcess  $subProcess
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubProcess $subProcess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubProcess  $subProcess
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubProcess $subProcess)
    {
        //
    }
}
