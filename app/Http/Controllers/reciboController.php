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

class reciboController extends Controller
{
    public function indexadmin()
    {

        $pagos = DB::table('recibo')
            ->join('solicitudes', 'recibo.solicitudes_id', '=', 'solicitudes.id')
            ->join('servicios', 'solicitudes.servicios_id', '=', 'servicios.id')
            ->join('residente', 'solicitudes.residente_id', '=', 'residente.id')
            ->join('apto', 'residente.apto_id', '=', 'apto.id')
            ->select('recibo.id', 'recibo.fecha', 'recibo.valor', 'recibo.valor_pendiente', 'recibo.estado', 'recibo.iva', 'recibo.descuento', 'servicios.nombre', 'apto.apartamento', 'apto.torre_id')
            ->get();
        $servicios = servicios::all();
        return view('layouts.admin.pagosList', compact('pagos'), compact('servicios'));
    }
    public function reportepdf()
    {
        $pagos = DB::table('recibo')
            ->join('solicitudes', 'recibo.solicitudes_id', '=', 'solicitudes.id')
            ->join('servicios', 'solicitudes.servicios_id', '=', 'servicios.id')
            ->join('residente', 'solicitudes.residente_id', '=', 'residente.id')
            ->join('apto', 'residente.apto_id', '=', 'apto.id')
            ->select('recibo.id', 'recibo.fecha', 'recibo.valor', 'recibo.valor_pendiente', 'recibo.estado', 'recibo.iva', 'recibo.descuento', 'servicios.nombre', 'apto.apartamento', 'apto.torre_id')
            ->get();

        $pdf = PDF::loadView('pdf.PagosList', compact('pagos'))->setOptions(['defaultFont' => 'sans-serif'],['isRemoteEnabled',TRUE]);
        return $pdf->download('report_Pagos' . time() . '.pdf');
    }


    public function index()
    {
        $id = auth()->user()->id;
        $residentes = residente::where('usuarios_id', $id)->first();

        $pagos = DB::table('recibo')
            ->join('solicitudes', 'recibo.solicitudes_id', '=', 'solicitudes.id')
            ->join('servicios', 'solicitudes.servicios_id', '=', 'servicios.id')
            ->where(['residente_id' => $residentes->id])
            ->select('recibo.id', 'recibo.fecha', 'recibo.valor', 'recibo.valor_pendiente', 'recibo.estado', 'recibo.iva', 'recibo.descuento', 'servicios.nombre')
            ->get();
        $servicios = servicios::all();
        $total_solicitudes = DB::table('recibo')
            ->where(['estado' => "Pago pendiente"])->count();

        return view('layouts.residente.pagosList')->with(compact('pagos'))->with(compact('servicios'))->with(['total' => $total_solicitudes]);
    }
    public function reportepdfUser()
    {
        $id = auth()->user()->id;
        $residentes = residente::where('usuarios_id', $id)->first();

        $pagos = DB::table('recibo')
            ->join('solicitudes', 'recibo.solicitudes_id', '=', 'solicitudes.id')
            ->join('servicios', 'solicitudes.servicios_id', '=', 'servicios.id')
            ->where(['residente_id' => $residentes->id])
            ->select('recibo.id', 'recibo.fecha', 'recibo.valor', 'recibo.valor_pendiente', 'recibo.estado', 'recibo.iva', 'recibo.descuento', 'servicios.nombre')
            ->get();

        $pdf = PDF::loadView('pdf.PagosListByUser', compact('pagos'))->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('report_Pagos' . time() . '.pdf');
    }
    public function datosRecibo($id)
    {
        $recibo = recibo::find($id);
        $solicitud = solicitudes::find($recibo->solicitudes_id);
        $servicio = servicios::find($solicitud->servicios_id);
        $asigna = asigna::where('solicitud_id', $solicitud->id)->first();
        $disponibilidad = disponibilidad::find($asigna->solicitud_id);

        return view('layouts.residente.pagos')->with(compact('recibo'))->with(compact('servicio'))->with(compact('solicitud'))->with(compact('disponibilidad'));;
    }
    public function confimacionRecibo($id)
    {
        $recibo = recibo::find($id);
        $solicitud = solicitudes::find($recibo->solicitudes_id);
        $solicitud->estado = "Pago exitoso";
        $solicitud->save();

        $asigna = asigna::where('solicitud_id', $recibo->solicitudes_id)->first();

        $disponibilidad = disponibilidad::find($asigna->solicitud_id);
        $disponibilidad->estado = "Pago exitoso";
        $disponibilidad->save();

        $recibo->estado = "Pago exitoso";
        $recibo->save();

        return redirect('MisPagos')->with('success', 'Transacción exitosa, lo podras ver reflejado en tus pagos');
    }
}
