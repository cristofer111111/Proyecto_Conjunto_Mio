<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\visitantes;
use App\Models\apto;
use App\Models\torre;
use Carbon\Carbon;
use App\Models\User;
use App\Models\residente;
use Illuminate\Support\Facades\Mail;
use App\Mail\visitantesMailLable;
use App\Http\Requests\storeVisitante;
use Barryvdh\DomPDF\Facade\Pdf;

class visitantesController extends Controller
{
    public function index()
    {
        $visitantes =  DB::table('visitantes')
            ->where('salio', '=', false)
            ->join('apto', 'visitantes.apto_id', '=', 'apto.id')
            ->select('visitantes.id', 'visitantes.name', 'visitantes.document', 'visitantes.phone', 'apto.apartamento', 'apto.torre_id', 'visitantes.created_at')
            ->get();

        return view('layouts.vigilante.VisitantesList', compact('visitantes'));
    }
    public function reportepdf()
    {
        $visitantes =  DB::table('visitantes')
            ->where('salio', '=', false)
            ->join('apto', 'visitantes.apto_id', '=', 'apto.id')
            ->select('visitantes.id', 'visitantes.name', 'visitantes.document', 'visitantes.phone', 'apto.apartamento', 'apto.torre_id', 'visitantes.created_at')
            ->get();

        $pdf = PDF::loadView('pdf.VisitantesList', compact('visitantes'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('report_visitantes' . time() . '.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $torres = torre::all();
        $aptos = apto::all();
        return view('layouts.vigilante.createVisitante', compact('torres'), compact('aptos'));
    }
    public function show($id)
    {
    }
    public function destroy($id)
    {
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeVisitante $request)
    {
        $visitante = new visitantes;
        $visitante->name = $request->input('nombre');
        $visitante->document = $request->input('cedula');
        $visitante->phone = $request->input('telefono');
        $visitante->apto_id = $request->input('apto_id');
        $visitante->salio = false;
        $visitante->save();

        return redirect('Visitantes')->with('success', 'Visitante creado correctamente');
    }

    public function edit($id)
    {
        $visitantes = visitantes::find($id);
        $torres = torre::all();
        $aptos = apto::all();
        return view('layouts.vigilante.editVisitante')->with(compact('torres'))->with(compact('visitantes'))->with(compact('aptos'));
    }

    public function update(storeVisitante $request, $id)
    {
        $visitante = visitantes::find($id);
        $visitante->name = $request->input('nombre');
        $visitante->document = $request->input('cedula');
        $visitante->phone = $request->input('telefono');
        $visitante->apto_id = $request->input('apto_id');
        $visitante->save();

        return redirect('Visitantes')->with('success', 'Visitante editado correctamente');
    }

    public function marcarSalida($id)
    {
        $visitante = visitantes::find($id);
        $visitante->salio = true;
        $visitante->salida = Carbon::now();
        $visitante->save();
        return redirect('Visitantes')->with('success', 'Visitante salio correctamente');
    }

    public function notificarResidente($id)
    {
        $visitante = visitantes::find($id);
        $residente =  residente::where('apto_id', $visitante->apto_id)->first();
        $user = User::find($residente->usuarios_id);
        $details = [
            'name' => $user->name,
            'nameResidente' => $visitante->name,
        ];
        Mail::to($user->email)->send(new visitantesMailLable($details));
        return redirect('Visitantes')->with('success', 'Residente notificado correctamente');
    }
}
