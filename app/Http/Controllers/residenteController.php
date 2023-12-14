<?php

namespace App\Http\Controllers;

use App\Models\residente;
use Illuminate\Http\Request;
use App\Models\apto;
use App\Models\torre;
use App\Models\User;
use App\Models\notificar;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactanosMailLable;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Requests\storeResidente;
use Barryvdh\DomPDF\Facade\Pdf;

class residenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residentes = DB::table('users')
            ->join('residente', 'users.id', '=', 'residente.usuarios_id')
            ->join('apto', 'residente.apto_id', '=', 'apto.id')
            ->select('users.id', 'users.name', 'users.email', 'users.phone', 'residente.tipo_residente', 'apto.apartamento', 'apto.torre_id')
            ->get();

        return view('layouts.admin.ResidentesList', compact('residentes'));
    }

    public function reportepdf()
    {
        $residentes = DB::table('users')
            ->join('residente', 'users.id', '=', 'residente.usuarios_id')
            ->join('apto', 'residente.apto_id', '=', 'apto.id')
            ->select('users.id', 'users.name', 'users.email', 'users.phone', 'residente.tipo_residente', 'apto.apartamento', 'apto.torre_id')
            ->get();

        $pdf = PDF::loadView('pdf.ResidentesList', compact('residentes'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('report'.time().'.pdf');
        return redirect('Usuarios/Residentes')->with('success', 'Reporte generado correctamente');
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
        return view('layouts.admin.createResidente', compact('torres'), compact('aptos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeResidente $request)
    {
        $user = new User();
        $user->name = $request->input('nombre');
        $user->document = $request->input('cedula');
        $user->phone = $request->input('telefono');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('cedula'));
        $user->save();
        $user->assignRole('residente');
        $residente = new residente();
        $residente->usuarios_id = $user->id;
        $residente->tipo_residente = $request->input('tipo_residente');
        $residente->apto_id = $request->input('apto_id');
        $residente->save();

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->input('email'),
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        $details = [
            'name' => $request->input('nombre'),
            'document' => $request->input('cedula'),
            'phone' => $request->input('telefono'),
            'email' => $request->input('email'),
            'resetUrl' => url(route('reset.password.get', $token, false) . '?new=true')
        ];

        Mail::to($request->input('email'))->send(new contactanosMailLable($details));
        return redirect('Usuarios/Residentes')->with('success', 'Residente creado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\residente  $residente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarios = User::find($id);
        $residentes = residente::where('usuarios_id', $id)->first();
        $torres = torre::all();
        $aptos = apto::all();
        return view('layouts.admin.editResidente')->with(compact('torres'))->with(compact('usuarios'))->with(compact('residentes'))->with(compact('aptos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\residente  $residente
     * @return \Illuminate\Http\Response
     */
    public function update(storeResidente $request, $id)
    {

        $user = User::find($id);
        $residente = residente::where('usuarios_id', $id)->first();
        $user->name = $request->input('nombre');
        $user->document = $request->input('cedula');
        $user->phone = $request->input('telefono');
        $user->save();

        $residente = residente::where('usuarios_id', $id)->first();
        $residente->tipo_residente = $request->input('tipo_residente');
        $residente->apto_id = $request->input('apto_id');

        $residente->save();

        return redirect('Usuarios/Residentes')->with('success', 'Residente editado correctamente');
    }

    public function notificar(Request $request, $id)
    {
        $user = User::find($id);
        $residente = residente::where('usuarios_id', $id)->first();

        $notificar = new notificar();
        $notificar->titulo = $request->input('title');
        $notificar->residente_id = $residente->id;
        $notificar->observaciones = $request->input('Observaciones');
        $notificar->clasification = $request->input('clasification');
        $notificar->save();

        return redirect('Usuarios/Residentes')->with('success', 'Residente notificado correctamente');
    }
    public function IndexNotificar()
    {
        $id = auth()->user()->id;
        $residentes = residente::where('usuarios_id', $id)->first();
        $notificaciones = DB::table('notificar')
            ->where(['residente_id' => $residentes->id])
            ->select('notificar.titulo', 'notificar.observaciones', 'notificar.clasification')
            ->get();

            return view('layouts.residente.reportesList', compact('notificaciones'));
    }
    public function show($id)
    {
        return redirect('Usuarios/Residentes')->with('success', 'Reporte generado correctamente');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\residente  $residente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $residente = residente::where('usuarios_id', $id)->first()->delete();
        $user = User::find($id)->delete();
        return redirect('Usuarios/Residentes')->with('success', 'Residente eliminado correctamente');
    }
}
