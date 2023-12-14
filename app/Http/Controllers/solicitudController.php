<?php

namespace App\Http\Controllers;

use App\Http\Requests\storesolicitud;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\residente;
use App\Models\servicios;
use App\Models\apto;
use Illuminate\Support\Facades\Mail;
use App\Mail\visitantesMailLable;
use App\Models\solicitudes;
use App\Models\asigna;
use App\Models\disponibilidad;
use App\Models\recibo;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class solicitudController extends Controller
{
    public function indexadmin()
    {
        $solicitudes = DB::table('solicitudes')
            ->join('servicios', 'solicitudes.servicios_id', '=', 'servicios.id')
            ->join('asigna', 'solicitudes.id', '=', 'asigna.solicitud_id')
            ->join('disponibilidad', 'asigna.id', '=', 'disponibilidad.id')
            ->join('residente', 'solicitudes.residente_id', '=', 'residente.id')
            ->join('apto', 'residente.apto_id', '=', 'apto.id')
            ->select('solicitudes.id', 'solicitudes.fecha_evento', 'solicitudes.residente_id', 'solicitudes.servicios_id', 'solicitudes.estado', 'servicios.nombre', 'servicios.precio', 'apto.apartamento', 'apto.torre_id', 'disponibilidad.descripcion')
            ->get();

        $total_solicitudes = DB::table('solicitudes')
            ->where(['estado' => "Solicitado"])->count();

        $servicios = servicios::all();
        return view('layouts.admin.solicitudesList')->with(compact('solicitudes'))->with(compact('servicios'))->with(['total' => $total_solicitudes]);
    }

    public function index()
    {
        $id = auth()->user()->id;
        $residentes = residente::where('usuarios_id', $id)->first();

        $solicitudes = DB::table('solicitudes')
            ->where(['residente_id' => $residentes->id])
            ->join('servicios', 'solicitudes.servicios_id', '=', 'servicios.id')
            ->join('asigna', 'solicitudes.id', '=', 'asigna.solicitud_id')
            ->join('disponibilidad', 'asigna.id', '=', 'disponibilidad.id')
            ->select('solicitudes.id', 'solicitudes.fecha_evento', 'solicitudes.residente_id', 'solicitudes.servicios_id', 'solicitudes.estado', 'servicios.nombre', 'servicios.precio', 'solicitudes.observacionesAdmin', 'disponibilidad.descripcion')
            ->get();
        $servicios = servicios::all();
        $total_solicitudes = DB::table('solicitudes')
            ->where(['estado' => "Aceptado"])->count();
        return view('layouts.residente.solicitudesList')->with(compact('solicitudes'))->with(compact('servicios'))->with(['total' => $total_solicitudes]);
    }

    public function create()
    {
        $servicios = servicios::all();
        return view('layouts.residente.reservar', compact('servicios'));
    }

    public function store(storesolicitud $request)
    {
        $id = auth()->user()->id;
        $residentes = residente::where('usuarios_id', $id)->first();

        $solicitud = new solicitudes();
        $solicitud->servicios_id = $request->input('servicio_id');
        $solicitud->fecha_evento = $request->input('fecha');
        $solicitud->estado = "Solicitado";
        $solicitud->residente_id = $residentes->id;
        $solicitud->observacionesAdmin = ".";
        $solicitud->save();

        $disponibilidad = new disponibilidad();
        $disponibilidad->estado = "Solicitada";
        $disponibilidad->descripcion = $request->input('observaciones');
        $disponibilidad->save();

        $asigna = new asigna();
        $asigna->disponibilidad_id = $disponibilidad->id;
        $asigna->solicitud_id = $solicitud->id;
        $asigna->save();

        return redirect('Solicitudes')->with('success', 'Solicitud creada correctamente');
    }
    public function show($id){

    }
    public function revisar($id)
    {
        $solicitud = solicitudes::find($id);
        $servicios = servicios::all();
        $asigna = asigna::where('solicitud_id', $id)->first();
        $disponibilidad = disponibilidad::find($asigna->solicitud_id);

        return view('layouts.admin.reservarRevisar')->with(compact('solicitud'))->with(compact('servicios'))->with(compact('disponibilidad'));;
    }

    public function revisarUpdate(Request $request, $id)
    {
        $solicitud = solicitudes::find($id);
        $solicitud->observacionesAdmin = $request->input('observacionesAdmin');
        $solicitud->estado = $request->input('respuesta');
        $solicitud->save();

        $asigna = asigna::where('solicitud_id', $id)->first();

        $disponibilidad = disponibilidad::find($asigna->solicitud_id);
        $disponibilidad->estado = $request->input('respuesta');
        $disponibilidad->save();

        return redirect('Solicitudes/Admin')->with('success', 'Solicitud revisada correctamente');
    }
    public function generarRecibo($id)
    {
        $name = auth()->user()->name;
        $solicitud = solicitudes::find($id);
        $asigna = asigna::where('solicitud_id', $id)->first();
        $disponibilidad = disponibilidad::find($asigna->disponibilidad_id);
        $servicio = servicios::find($solicitud->servicios_id);
        $details = [
            'name' => $name,
            'id' => $solicitud->id,
            'nombre' => $servicio->nombre,
            'precio' => $servicio->precio,
            'fecha_evento' => $solicitud->fecha_evento,
            'estado' => $solicitud->estado,
            'descripcion' => $disponibilidad->descripcion
        ];
        $pdf = PDF::loadView('pdf.recibo', compact('details'))->setOptions(['defaultFont' => 'Arimo']);
        $pdf->setPaper(array(0, 0, 300, 500));
        return $pdf->download('recibo' . time() . '.pdf');
    }

    public function pagarSolicitud(Request $request, $id)
    {
        $solicitud = solicitudes::find($id);
        $asigna = asigna::where('solicitud_id', $id)->first();
        $disponibilidad = disponibilidad::find($asigna->disponibilidad_id);

        $solicitud->estado = "Pendiente pago";
        $solicitud->save();
        $disponibilidad->estado = "Pendiente pago";
        $disponibilidad->save();

        $servicio = servicios::find($solicitud->servicios_id);

        $recibo = new recibo();
        $recibo->solicitudes_id = $id;
        $recibo->fecha = date('Y-m-d H:i:s');
        $recibo->estado = "Pago pendiente";
        $recibo->descuento = 0;
        $recibo->valor_pendiente = 0;
        $recibo->iva = 0;
        $recibo->valor = $servicio->precio;

        $recibo->save();

        return redirect('Solicitudes')->with('success', 'Transacción creada correctamente, lo podras ver reflejado en tus pagos');
    }

    public function destroy($id)
    {
        $solicitud = solicitudes::find($id);
        $asigna = asigna::where('solicitud_id', $id)->first();
        $disponibilidad = disponibilidad::find($asigna->disponibilidad_id)->delete();
        $asigna->delete();
        $solicitud->delete();
        return redirect('Solicitudes')->with('success', 'Solicitud eliminada correctamente');
    }
}
