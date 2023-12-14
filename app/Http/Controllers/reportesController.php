<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reportes;
use App\Http\Requests\storeReportes;
use App\Models\funcionario;
class reportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reportes = reportes::all();
        return view('layouts.funcionario.reportesList', compact('reportes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.funcionario.createReporte');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeReportes $request)
    {
        $id = auth()->user()->id;
        $funcionario = funcionario::where('usuarios_id', $id)->first();
        $reportes = reportes::create([
            'funcionario_id' => $funcionario->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'clasification' => $request->input('clasification'),
        ]);
        return redirect('Reportes')->with('success', 'Reporte #' . $reportes->id . ' creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reportes = reportes::find($id);
        return view('layouts.funcionario.editReporte', compact('reportes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storeReportes $request, $id)
    {

        $reportes = reportes::find($id);
        $reportes->title = $request->input('title');
        $reportes->description = $request->input('description');
        $reportes->clasification = $request->input('clasification');
        $reportes->save();

        return redirect('Reportes')->with('success', 'Reporte #' . $reportes->id . ' editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
