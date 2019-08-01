<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreDispatch;
use App\Http\Requests\UpdateDispatch;
use App\Exporter;
use App\SubProcess;
use App\Dispatch;
use App\Rejected;
use App\TipoDispatch;

class DispatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listexporter = Exporter::paginate();
        $listdispatches = dispatch::paginate();
        $listtipodispatch = TipoDispatch::paginate();

        

        return view('dispatch.index', compact('listexporter', 'listdispatches','listtipodispatch'));
    }

    public function getSubProcess(){
        $subprocesses = SubProcess::paginate();

        return view('dispatch.camara', compact('subprocesses'));
    }

    public function showCam(Process $process){
        $subprocess1 = $subprocess->id;
        // $receptions = Process_Reception::where('process_id',$process1)->get();
        $receptions = SubProcess::find($subprocess1);

        return view('dispatch.showcam', compact('receptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //lista de tabla pivote en despacho (checkbox)

        $subprocesses = SubProcess::orderBy('id', 'DES')->where('available', 1)->get();

        $listexporter = Exporter::OrderBy('id', 'DES')->pluck('name', 'id');
        $listRejecteds = Rejected::OrderBy('id', 'ASC')->pluck('reason', 'id');
        $listtipodispatch = TipoDispatch::OrderBy('id', 'ASC')->pluck('name', 'id');


        return view('dispatch.create', compact('listexporter', 'subprocesses','listRejecteds','listtipodispatch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDispatch $request)
    {   
      
          //instancio el radio button
          $rejected = $request->get('rejected');
          $reason = $request->get('reason');
          $comment = $request->get('comment');

         
            
          //quitar rate y reason  del array reception
          unset($request['reason']);
          unset($request['comment']);
        
          //Guarda la despacho
        $dispatch = Dispatch::create($request->all());

        $dispatch->processes()->attach($request->get('subprocess'));
        $dispatch_id = $dispatch->id;

        $checklistdata = $request->get('subprocess');

        foreach ($checklistdata as $key) {
            SubProcess::where('id', $key)->update(['available' => 0]);
        }

        if($rejected==1){
            $rejected = ['reception_id' => $dispatch_id, 
            'reason' => $reason,
            'comment' => $comment
          ];
            $rejected = Rejected::create($rejected);
            
        }else{
        }


        return redirect()->route('dispatch.index', $dispatch->id)->with('info', 'despacho guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Dispatch $dispatch)
    {
        return view('dispatch.show', compact('dispatch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Dispatch $dispatch)
    {
        $listexporter = Exporter::OrderBy('id', 'ASC')->pluck('name', 'id');
        $subprocesses = SubProcess::orderBy('id', 'ASC')->where('available', 1)->get();

        return view('dispatch.edit', compact('dispatch', 'listexporter', 'subprocesses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDispatch $request,Dispatch $dispatch)
    {
        $dispatch = Dispatch::find($id);
        $dispatch->update($request->all());
        $dispatch->subprocess()->sync($request->get('processes'));

        return redirect()->route('dispatch.index', $dispatch->id)->with('info', 'despacho actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dispatch $dispatch)
    {
        $dispatch->delete();

        return back()->with('info', 'Eliminado el despacho con éxito');
    }

    //////////////////////////////////////funciones///////////////////////

    public function dispatchdaily()
    {
        //Carbon(agarra las fecha segun el metodo'today') hecho para hoy
        $today = Carbon::today();
        //cuenta todas las recepciones de hoy
        $cuenta = Dispatch::where('created_at', '>=', $today)->count();

        return view('home', compact('cuenta'));
    }
}
