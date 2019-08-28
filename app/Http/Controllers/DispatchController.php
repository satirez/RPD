<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateDispatch;
use App\Exporter;
use App\SubProcess;
use App\Dispatch;
use App\Rejected;
use App\Fruit;
use App\Lote;
use App\Quality;
use App\Format;
use App\TipoDispatch;
use App\Season;
use App\TipoTransporte;
use App\TipoProductoDispatch;
use Yajra\Datatables\Datatables;

class DispatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $despachos = Dispatch::all();

        return view('dispatch.index', compact('despachos'));
    }

    public function getData()
    {
        $dispatches = Dispatch::with([
            'tipodispatch',
            'tipotransporte',
            'season',
        ]);

        return Datatables::of($dispatches)
            ->addColumn('tipodispatch', function ($dispatch) {
                return $dispatch->tipodispatch->name;
            })
            ->editColumn('tipotransporte', function ($dispatch) {
                return $dispatch->tipotransporte->name;
            })

            ->editColumn('season', function ($dispatch) {
                return $dispatch->season->name;
            })

            ->make(true);
    }

    public function getLotes()
    {
        $lotes = Lote::orderBy('id','ASC')->paginate(20);

        return view('dispatch.camara', compact('lotes'));
    }

    public function showCam(Lote $lotes)
    {
        $lote1 = $lotes->id;
        // $receptions = Process_Reception::where('process_id',$process1)->get();
        $lotes = Lote::find($lote1);

        return view('dispatch.showcam', compact('lotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //lista de tabla pivote en despacho (checkbox)

                                                        //cambiar el formato
       // $subprocesses = SubProcess::orderBy('id', 'DES')->where('available','!0' ,'&&', 'format_id', !6)->get();

        $lotes = Lote::orderBy('id', 'DES')->where('available', 1)->get();
        $listexporter = Exporter::OrderBy('id', 'DES')->pluck('name', 'id');
        $listRejecteds = Rejected::OrderBy('id', 'ASC')->pluck('reason', 'id');
        $listtipodispatch = TipoDispatch::OrderBy('id', 'ASC')->pluck('name', 'id');
        $listFormat = Format::OrderBy('id', 'DES')->pluck('name', 'id', 'weight');
        $listFruits = Fruit::OrderBy('id', 'DES')->pluck('specie', 'id');
        $listQualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');
        $listSeasons = Season::OrderBy('id', 'DES')->pluck('name', 'id');
        $listTipoTransporte = TipoTransporte::OrderBy('id', 'DES')->pluck('name', 'id');
        $listTipoProductoDispatch = TipoProductoDispatch::OrderBy('id', 'DES')->pluck('name', 'id');

        return view('dispatch.create', compact(
            'listexporter', 'lotes',
            'listRejecteds', 'listtipodispatch',
            'listFormat', 'listFruits', 'listQualities', 'listSeasons',
            'listTipoTransporte', 'listTipoProductoDispatch')
        );
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

        

       //Guarda la despacho
        $dispatch = Dispatch::create($request->all());
        $dispatch->subprocesses()->attach($request->get('subprocesses'));
        $checklistdata = $request->get('subprocesses');
        foreach ($checklistdata as $key) {
            SubProcess::where('id', $key)->update(['available' => 0]);
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
    public function update(UpdateDispatch $request, Dispatch $dispatch)
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
