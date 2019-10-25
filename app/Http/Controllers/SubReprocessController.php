<?php

namespace App\Http\Controllers;

use App\SubReprocess;
use App\ReProcess;
use App\Format;
use App\Lote;
use App\Fruit;
use App\Status;
use App\Variety;
use App\Quality;
use App\motivorejected;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubReprocessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($reprocess_id, $identificador)
    {
     
        $last = SubReprocess::OrderBy('id', 'DES')->first();
        if ($last == null) {
            $lastid = 1;
        } else {
            $lastid = $last->id + 1;
        }

        if ($identificador == 's') {

             $re_subprocesses = DB::table('reprocess_sub_process')->where('reprocess_id', $reprocess_id)->get();
      
            $pesos = array();

            foreach ($re_subprocesses as $re_subprocess) {
       
                $sub = DB::table('sub_processes')->where('id', $re_subprocess->sub_process_id)->get();
               
                $peso = $sub[0]->weight;
                
                array_push($pesos, $peso);
            }

            $peso = array_sum($pesos);
          

         
            $subrId = SubReprocess::where('reprocess_id', $reprocess_id)->get();

            $acumWeight = SubReprocess::where('reprocess_id', $reprocess_id)->sum('weight');

            $resto = 0;

            $subprocesses = SubReprocess::where('reprocess_id', $reprocess_id)->where('rejected', 0)->paginate();

            //formato y peso para la vista
            $listFormat = Format::OrderBy('id', 'DES')->pluck('name', 'weight');
            $listQualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');
            $listRejecteds = motivorejected::OrderBy('id', 'ASC')->pluck('name', 'id');
            $listFruits = Fruit::OrderBy('id', 'DES')->get();

            $listVariety = Variety::OrderBy('id', 'DES')->pluck('variety', 'id');

            $listStatus = Status::OrderBy('id', 'DES')->pluck('name', 'id');

            return view('subreprocess.create', compact('lastid', 'reprocess_id', 'peso', 'listFormat', 'listQualities', 'listRejecteds', 'acumWeight', 'resto', 'subprocesses', 'listFruits', 'listVariety', 'listStatus', 'identificador'));

        } elseif ($identificador == 'l') {
            
            $reprocess_lotes = DB::table('lote_reprocess')->where('reprocess_id', $reprocess_id)->get();
            
            $pesos = array();

            foreach ($reprocess_lotes as $reprocess_lote) {
                $lote = DB::table('lotes')->where('id', $reprocess_lote->lote_id)->get();
                $peso = $lote[0]->palletWeight;
              
                array_push($pesos, $peso);
            }

            $peso = array_sum($pesos);

            $subrId = SubReprocess::where('reprocess_id', $reprocess_id)->get();         
       
            $acumWeight = SubReprocess::where('reprocess_id', $reprocess_id)->sum('weight');
            
            $resto = 0;

            $subprocesses = SubReprocess::where('reprocess_id', $reprocess_id)->where('rejected', 0)->paginate();

            //formato y peso para la vista
            $listFormat = Format::OrderBy('id', 'DES')->pluck('name', 'weight');
            $listQualities = Quality::OrderBy('id', 'DES')->pluck('name', 'id');
            $listRejecteds = motivorejected::OrderBy('id', 'ASC')->pluck('name', 'id');
            $listFruits = Fruit::OrderBy('id', 'DES')->get();

            $listVariety = Variety::OrderBy('id', 'DES')->pluck('variety', 'id');

            $listStatus = Status::OrderBy('id', 'DES')->pluck('name', 'id');
          
            return view('subreprocess.create', compact('lastid', 'reprocess_id', 'peso', 'listFormat', 'listQualities', 'listRejecteds', 'acumWeight', 'resto', 'subprocesses', 'listFruits', 'listVariety', 'listStatus', 'identificador'));
        }

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
        if ($request->identificador == 'l') {
            $identificador = 'l';
        }

        if ($request->identificador == 's') {
            $identificador = 's';
        }
        //validacion y desactivacion de un reproceso
        if ($request->format_id === '1.000') {
            $idReProcess = $request->get('process_id'); //id de proceso

            $weightFormat = $request->get('format_id'); //se obtiene el peso del formato
            $formatId = Format::where('weight', $weightFormat)->first()->id; //obtener el id de formato

            $request['format_id'] = $formatId; //se le pasa el nuevo parametro (id) a format_id del request!

            $fruit_id = ReProcess::where('id', $idReProcess)->first()->fruit_id;
            $variety_id = ReProcess::where('id', $idReProcess)->first()->variety_id;

            $request->merge(['fruit_id' => $fruit_id, 'variety_id' => $variety_id]);

            //desactivacion de reproceso
            SubReProcess::create($request->all());
            Process::where('id', $idReProcess)->update(['available' => 0]);

            return redirect()->route('subreprocesses.create')->with('info', 'Re-Proceso finalizado con exito');

        } else {
            $idReProcess = $request->get('reprocess_id'); //id de reproceso

            $weightFormat = $request->get('format_id'); //se obtiene el peso del formato
            $formatId = Format::where('weight', $weightFormat)->first()->id; //obtener el id de formato

            $request['format_id'] = $formatId; //se le pasa el nuevo parametro (id) a format_id del request!

            $fruit_id = ReProcess::where('id', $idReProcess)->first()->fruit_id;
            $variety_id = ReProcess::where('id', $idReProcess)->first()->variety_id;
            $status_id = ReProcess::where('id', $idReProcess)->first()->status_id;

            $request->merge([
                'fruit_id' => $fruit_id,
                'variety_id' => $variety_id,
                'status_id' => $status_id,
                'reprocess_id' => $idReProcess, ]);

            SubReprocess::create($request->all());
            

            return redirect()->route('subreprocess.create', [$idReProcess, $identificador])->with('info', 're proceso guardado con exito');
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
}
