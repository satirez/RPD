<?php

namespace App\Http\Controllers;

use App\Process;
use App\Fruit;
use App\Providers;
use App\Variety;
use App\Dispatch;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class ReportesController extends Controller
{

    
    public function reporteProcesoDaily()
    {

        return view('reportes.procesoDaily');
    }

    public function reporteProcesoDailySearch()
    {
        $q = Input::post('date');
        $processes = Process::whereDate('created_at', '=', $q)->get();

        return view('reportes.procesoDailySearch', compact('processes'));
    }

    public function reporteProcesoFruit()
    {
        $fruits = Fruit::all();

        return view('reportes.procesoFruit', compact('fruits'));
    }

    public function reporteProcesoFruitSearch()
    {

       $q = Input::post('variety_id');
        $qq = Input::post('fruit_id');
        
        $processes = Process::where('fruit_id', $q)->where('variety_id',$qq)->get();
        $fruits = Fruit::OrderBy('id', 'DES')->get();

        $varieties = Variety::OrderBy('id', 'DES')->pluck('variety', 'id');


        return view('reportes.procesoFruitSearch', compact('processes', 'fruits','varieties'));
    }

    public function reporteProcesoProvider()
    {
        $listProviders = Providers::OrderBy('id', 'DES')->get();

        return view('reportes.procesoProvider', compact('listProviders'));
    }

    public function reporteProcesoProviderSearch()
    {
        $q = Input::post('provider_id');
        $processes = Process::all()->where('provider_id', $q);
        $listProviders = Providers::OrderBy('id', 'DES')->get();

        return view('reportes.procesoProviderSearch', compact('processes', 'listProviders'));
    }

    // DESPACHO 

    public function reporteDespachoDaily()
    {
        return view('reportes.dispatchDaily');
    }

    public function reporteDespachoDailySearch()
    {
        $q = Input::post('date');
        $dispatchs = Dispatch::whereDate('created_at', '=', $q)->get();

        return view('reportes.dispatchDailySearch', compact('dispatchs'));
    }

    public function reporteDespachoFruit()
    {
        $fruits = Fruit::all();

        return view('reportes.dispatchFruit', compact('fruits'));
    }

    public function reporteDespachoFruitSearch()
    {
        dd('NO HAY FRUTA EN DESPACHO...');
        $q = Input::post('fruit_id');
        $dispatchs = Dispatch::where('fruit_id', $q)->get();
        $fruits = Fruit::all();

        return view('reportes.dispatchFruitSearch', compact('dispatchs', 'fruits'));
    }

    public function reporteDespachoProvider()
    {
        $listProviders = Providers::OrderBy('id', 'DES')->get();

        return view('reportes.dispatchProvider', compact('listProviders'));
    }

    public function reporteDespachoProviderSearch()
    {
        $q = Input::post('provider_id');
        $dispatchs = Dispatch::all()->where('provider_id', $q);
        $listProviders = Providers::OrderBy('id', 'DES')->get();

        return view('reportes.dispatchProviderSearch', compact('dispatchs', 'listProviders'));
    }
}
