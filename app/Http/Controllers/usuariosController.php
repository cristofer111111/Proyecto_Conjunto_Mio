<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\funcionario;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactanosMailLable;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Requests\storeUser;
use Barryvdh\DomPDF\Facade\Pdf;

class usuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = DB::table('users')
            ->join('funcionario', 'users.id', '=', 'funcionario.usuarios_id')
            ->select('users.id', 'users.name', 'users.email', 'users.phone','funcionario.cargo')
            ->get();

        return view('layouts.admin.EmployeList', compact('usuarios'));
    }
    public function reportepdf()
    {
        $usuarios = DB::table('users')
        ->join('funcionario', 'users.id', '=', 'funcionario.usuarios_id')
        ->select('users.id', 'users.name', 'users.email', 'users.phone','funcionario.cargo')
        ->get();

        $pdf = PDF::loadView('pdf.FuncionariosList', compact('usuarios'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('report_Funcionarios'.time().'.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.createEmploye');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeUser $request)
    {

        $user = new User;
        $user->name = $request->input('nombre');
        $user->document = $request->input('cedula');
        $user->phone = $request->input('telefono');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('cedula'));
        $user->save();
        $user->assignRole($request->input('cargo'));
        $employe = new funcionario;
        $employe->usuarios_id = $user->id;
        $employe->cargo = $request->input('cargo');
        $employe->fecha_ingreso = date('Y-m-d H:i:s');
        $employe->fecha_salida = date('Y-m-d H:i:s');
        $employe->observaciones = $request->input('observaciones');

        $employe->save();
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
            'resetUrl' => url(route('reset.password.get', $token, false).'?new=true')
        ];

        Mail::to($request->input('email'))->send(new contactanosMailLable($details));

        return redirect('Usuarios/Funcionarios')->with('success', 'Funcionario creado correctamente');
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
        $usuarios = User::find($id);
        $funcionario = funcionario::where('usuarios_id', $usuarios->id)->first();
        return view('layouts.admin.editEmploye', compact('usuarios'), compact('funcionario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storeUser $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('nombre');
        $user->document = $request->input('cedula');
        $user->phone = $request->input('telefono');
        $user->email = $request->input('email');
        $user->save();

        $employe =  funcionario::where('usuarios_id',$id)->first();
        $employe->usuarios_id = $user->id;
        $employe->cargo = $request->input('cargo');
        $employe->fecha_ingreso = date('Y-m-d H:i:s');
        $employe->fecha_salida = date('Y-m-d H:i:s');
        $employe->observaciones = $request->input('observaciones');

        $employe->save();

        return redirect('Usuarios/Funcionarios')->with('success', 'Funcionario editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employe =  funcionario::where('usuarios_id',$id)->first()->delete();
        $user = User::find($id)->delete();
        return redirect('Usuarios/Funcionarios')->with('success', 'Funcionario eliminado correctamente');
    }
}
