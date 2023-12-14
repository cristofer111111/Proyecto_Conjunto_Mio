<?php

namespace App\Http\Controllers;

use App\Models\anuncios;
use Illuminate\Http\Request;
use App\Http\Requests\storeAnnounce;
use App\Models\administrador;

class anunciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anuncios = anuncios::all();
        return view('dashboard',compact('anuncios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anuncios = anuncios::all();
        return view('layouts.admin.createannounce', compact('anuncios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeAnnounce $request)
    {
        $id = auth()->user()->id;
        $admin = administrador::where('usuarios_id', $id)->first();
        $anuncios = anuncios::create([
            'administrador_id'=> $admin->id,
            'titulo' => $request->input('announceTitle'),
            'mensaje' => $request->input('announceMessage'),
            'usuarios_notificados'=> $request->input('announcePersons'),
            'fecha' => date('Y-m-d H:i:s'),
        ]);
        return redirect('Anuncios')->with('success', 'Anuncio creado correctamente');
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
        $anuncios = anuncios::find($id);
        return view('layouts.admin.editannounce', compact('anuncios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storeAnnounce $request, $id)
    {
        $user = auth()->user();
        $anuncios = anuncios::find($id)->update([
            'administrador_id'=> 1,
            'titulo' => $request->input('announceTitle'),
            'mensaje' => $request->input('announceMessage'),
            'fecha' => date('Y-m-d H:i:s'),
            'usuarios_notificados'=> $request->input('announcePersons'),
        ]);
        return redirect('Anuncios')->with('success', 'Anuncio editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anuncios = anuncios::find($id)->delete();
        return redirect(('Anuncios'))->with('success', 'Anuncio eliminado correctamente');
    }
}
