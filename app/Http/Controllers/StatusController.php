<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::paginate();
        return view('admin.statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.statuses.create');
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
        $status = Status::create($request->all());
        return redirect()->route('admin.statuses.index', $status->id)->with('info', 'estatus guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Status $status
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        return view('admin.statuses.show', compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Status $status
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        return view('admin.statuses.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Status              $status
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        $status->update($request->all());

        return redirect()->route('admin.statuses.index', $status->id)->with('info', 'estatus actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Status $status
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        $status->delete();

        return back()->with('info', 'estatus eliminado con exito');
    }
}
