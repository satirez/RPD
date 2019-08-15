<?php

namespace App\Http\Controllers;

use App\Reception;
use App\Supplies;
use App\Providers;
use App\Fruit;
use App\Variety;
use App\Quality;
use App\Status;
use App\Rejected;
use App\Season;
use App\Rate;
use App\motivorejected;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateReception;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;

class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //sin procesar
        $receptions = Reception::where('available', 1)->paginate();
        $receptionWeight = Reception::where('available', 1)->sum('netweight');
        $receptionQuantity = Reception::where('available', 1)->sum('quantity');
        $receptionCount = Reception::where('available', 1)->count();
        //$ = Reception::paginate();

        return view('receptions.index', compact('receptions', 'receptionWeight', 'receptionQuantity', 'receptionCount'));
    }

    public function inprocess()
    {
        //procesadas
        $inprocess = Reception::where('available', 0)->paginate();

        return view('receptions.inprocess', compact('inprocess'));
    }

    //funcion creada para hacer reportes
    public function receptionsdaily()
    {
        //Carbon(agarra las fecha segun el metodo'today') hecho para hoy
        $today = Carbon::today();
        //agarra toda la lista de recepciones ingresadas hoy
        $inprocess = Reception::where('created_at', '>=', $today)->paginate();
        //cuenta todas las recepciones de hoy
        $cuenta = Reception::where('created_at', '>=', $today)->count();
        //suma todos los pesos brutos de hoy
        $pesobruto = Reception::Where('created_at', '>=', $today)->sum('grossweight');
        //suma todos los pesos netos de hoy
        $pesoneto = Reception::Where('created_at', '>=', $today)->sum('netweight');

        return view('receptions.receptionsdaily', compact('inprocess', 'pesobruto', 'pesoneto', 'cuenta'));
    }

    public function receptionsperfruit()
    {
        //procesadas
        $inprocess = Reception::where('available', 0)->paginate();

        return view('receptions.receptionsperfruit', compact('inprocess'));
    }

    public function receptionsperproductor()
    {
        return view('receptions.receptionsperproductor');
    }

    public function getData()
    {
        $receptions = Reception::where('available', 1)->with([
            'fruit',
            'provider',
            'supplies',
            'season',
            'quality',
            
        ]);


        return Datatables::of($receptions)
            ->addColumn('fruit', function ($reception) {
                return $reception->fruit->specie;
            })
            ->editColumn('provider', function ($reception) {
                return $reception->provider->name;
            })
            ->editColumn('supplies', function ($reception) {
                return $reception->supplies->name;
            })
            ->editColumn('season', function ($reception) {
                return $reception->season->name;
            })
            ->editColumn('quality', function ($reception) {
                return $reception->quality->name;
            })
          
      

            ->make(true);
    }

    public function print(){

        $receptions = Reception::first();
        return view('receptions.print',compact('receptions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $receptionslist = Reception::paginate('5');

        $listSupplies = Supplies::OrderBy('id', 'DES')->pluck('name', 'weight');

        $listProviders = Providers::OrderBy('id', 'DES')->pluck('name', 'id');

        $listFruits = Fruit::OrderBy('id', 'DES')->get();

        $listVariety = Variety::OrderBy('id', 'DES')->pluck('variety', 'id');

        $listRejecteds = MotivoRejected::OrderBy('id', 'DES')->pluck('name', 'id');

        $listQualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');

        $listSeasons = Season::OrderBy('id', 'DES')->pluck('name', 'id');

        $listStatus = Status::OrderBy('id', 'DES')->pluck('name', 'id');

        $last = Reception::OrderBy('id', 'DES')->first();

        if ($last == null) {
            $lastid = 1;
        } else {
            $lastid = $last->id + 1;
        }

        return view('receptions.create', compact(
            'lastid',
            'receptionslist',
            'listStatus',
            'listSupplies',
            'listProviders',
            'listQualities',
            'listFruits',
            'listSeasons',
            'listRejecteds',
            'listVariety'
        ));
    }

    public function byFruit($id)
    {
        return Variety::where('fruit_id', $id)->get();
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



        // rate,reason y coment deben ir en el mismo request y tabla, ya que eliminamos la tabla rejected de la db

        $rejected = $request->get('rejected');
        $reason = $request->get('reason');
        $comment = $request->get('comment');

        //Obtiene el dato de la bandeja
        $supplies_id = $request->get('supplies_id');
        $supplies = Supplies::where('weight', $supplies_id)->first()->id;
        $request['supplies_id'] = "$supplies";

        //Obtener datos del request
        $id = $request->get('provider_id');
        $rate = $request->get('rate');

        //array que envia a tablas
        $rate = ['provider_id' => $id, 'rate' => $rate];

        //Guarda la calificación
        $rate = Rate::create($rate);

        $reception = $request->all();
        //quitar rate y reason  del array reception
        unset($request['rate']);
        unset($request['reason']);
        unset($request['commentrejected']);

        //Guarda la Recepción
        $reception = Reception::create($reception);
        $reception_id = $reception->id;

        // RECHAZADOS
        //instancio el radio button

        if ($rejected == 1) {
            $rejected = [
                'reception_id' => $reception_id,
                'reason' => $reason,
                'commentrejected' => $comment,
            ];
            $rejected = Rejected::create($rejected);
        } else { }

        return redirect()->route('receptions.create', $reception->id)->with('info', 'Receptiono guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Reception $reception
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Reception $reception)
    {
        return view('receptions.show', compact('reception'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Reception $reception
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Reception $reception)
    {
        $receptionslist = Reception::paginate('5');

        $listSupplies = Supplies::OrderBy('id', 'DES')->pluck('name', 'weight');
        $listProviders = Providers::OrderBy('id', 'DES')->pluck('name', 'id');
        $listFruits = Fruit::OrderBy('id', 'DES')->get();

        $listVariety = Variety::OrderBy('id', 'DES')->pluck('variety', 'id');

        $listVariety = Variety::OrderBy('id', 'DES')->pluck('variety', 'id');
        $listQualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');
        $listSeasons = Season::OrderBy('id', 'DES')->pluck('name', 'id');
        $listStatus = Status::OrderBy('id', 'DES')->pluck('name', 'id');
        $listRejecteds = MotivoRejected::OrderBy('id', 'DES')->pluck('name', 'id');

        if ($reception->rejected == 1) {
            $rechazado = 'disponible';
        } else {
            $rechazado = 'rechazado';
            $rechazado = Rejected::where('reception_id', $reception->id)->first();

            $motivo = MotivoRejected::where('id', $rechazado->id)->pluck('name', 'id');
            $comment = MotivoRejected::where('id', $rechazado->id)->pluck('comment');
        }

        return view('receptions.edit', compact(
            'reception',
            'comment',
            'motivo',
            'rechazado',
            'listSupplies',
            'listStatus',
            'listProviders',
            'listQualities',
            'listFruits',
            'listSeasons',
            'listRejecteds',
            'listVariety'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Reception           $reception
     *
     * @return \Illuminate\Http\Response
     */

    //revisar UpdateRequest (no funca con eso)
    public function update(UpdateReception $request, Reception $reception)
    {
        $rejected = $reception->rejected;

        if ($rejected == 1) {
            $borrado = Rejected::where('reception_id', $reception->id)->delete();
        }

        $reception->update($request->all());

        return redirect()->route('receptions.index', $reception->id)->with('info', 'Reception actualizada con exito');
    }

    public function ChangeStatusTrue(Reception $reception)
    {
        $reception = Reception::find($reception->input('id'));
        $rejected = Reception::where('id', $reception)->get('rejected');

        dd($reception);
        if ($rejected == 1) {
            Reception::where('id', $reception)->update(['available' => 0]);
        } elseif ($rejected == 0) {
            Reception::where('id', $reception)->update(['available' => 1]);
        }

        return redirect()->route('receptions.index', $reception->id)->with('info', 'Reception actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Reception $reception
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reception $reception)
    {
        $reception->delete();

        return back()->with('info', 'Eliminado con exito');
    }
}