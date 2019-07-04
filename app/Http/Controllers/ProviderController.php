<?php

namespace App\Http\Controllers;

use App\Providers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProviders;
use App\Http\Requests\UpdateProviders;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Providers::paginate();

        return view('admin.providers.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.providers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProviders $request)
    {
        $providers = Providers::create($request->all());

        return redirect()->route('admin.providers.index', $providers->id)->with('info', 'Proveedor guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Providers $provider)
    {
        return view('admin.providers.show', compact('provider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Providers $provider)
    {
        return view('admin.providers.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProviders $request, Providers $provider)
    {
        $provider->update($request->all());

        return redirect()->route('admin.providers.index', $provider->id)->with('info', 'Proveedor actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Providers $provider)
    {
        $provider->delete();

        return back()->with('info', 'Eliminado con exito');
    }

    /////////////////////////funciones //////////////////////

    public function rateperprovider()
    {
      $rateperprovider = DB::table('rate')->avg('rate');

        return view('admin.providers.index', compact('rateperprovider'));

    }
}
