<?php

namespace App\Http\Controllers;

use App\Reception;
use App\Supplies;
use App\Providers;
use App\Fruit;
use App\Quality;
use App\Status;
use App\Rejected;
use App\Season;
use App\Rate;
use App\motivorejected;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateReception;
use Carbon\Carbon;

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
        $receptions = Reception::paginate();

        return view('receptions.index', compact('receptions'));
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
        $listProviders = Providers::pluck('name', 'id');
        //procesadas
        $inprocess = Reception::where('available', 0)->paginate();

        return view('receptions.receptionsperproductor', compact('inprocess', 'listProviders'));
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
        $listFruits = Fruit::OrderBy('id', 'DES')->pluck('specie', 'id');
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

        return view('receptions.create', compact('lastid', 'receptionslist',
         'listStatus', 'listSupplies', 'listProviders', 'listQualities',
          'listFruits', 'listSeasons', 'listRejecteds'));
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
        //Obtener datos del request
        $id = $request->get('provider_id');
        $rate = $request->get('rate');

        //array que envia a tablas
        $rate = ['provider_id' => $id, 'rate' => $rate];

        //Guarda la calificación
        $rate = Rate::create($rate);

        // RECHADOS

        //instancio el radio button
        $rejected = $request->get('rejected');

        if ($rejected == 1) {
            $rejected = ['reception_id' => $request->get('id'),
            'reason' => $request->get('reason'),
            'commentrejected' => $request->get('comment'), ];
            $rejected = Rejected::create($rejected);
        } else {
        }

        $request = $request->all();

        //quitar rate y reason  del array reception
        unset($request['rate']);
        unset($request['reason']);
        unset($request['commentrejected']);

        //    dd($request);

        //Guarda la Recepción
        $reception = Reception::create($request);

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
        $listFruits = Fruit::OrderBy('id', 'DES')->pluck('specie', 'id');
        $listRejecteds = MotivoRejected::OrderBy('id', 'DES')->pluck('name', 'id');

        $listQualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');

        $listSeasons = Season::OrderBy('id', 'DES')->pluck('name', 'id');

        $listStatus = Status::OrderBy('id', 'DES')->pluck('name', 'id');

        return view('receptions.edit', compact('reception','listSupplies','listStatus',
            'listProviders', 'listQualities', 'listFruits', 'listSeasons', 'listRejecteds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Reception           $reception
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReception $request, Reception $reception)
    {
        $reception->update($request->all());

        return redirect()->route('receptions.edit', $reception->id)->with('info', 'Reception actualizada con exito');
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
