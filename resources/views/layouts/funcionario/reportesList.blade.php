
<title>Tus reportes</title>
@extends('layouts.components.layout')
@section('title','Tus reportes')
@section('content')
<main>
    <div class="container .me-md-3 ">
        <div class="card text-center text-white bg-negro-reportes m-2">
            <div class="card-body">
                <p class="card-text">Como parte de los procesos en CONJUNTOMIO, es necesario que notifiques posibles daños.</p>
                <a href="Reportes/create" class="buttonEditarReportes">Nuevo Reporte</a>
            </div>
        </div>
        <div class="row">
            @foreach($reportes as $reporte)
            <div class="col-sm-6 d-grid">
                <div class="m-2 card text-white bg-negro-reportes">
                    <div class="card-body">
                        <h5 class="card-title labelcolor">{{$reporte -> title}}</h5>
                        <h6 class={{ $reporte -> clasification == "Alto" ? 'card-subtitle mb-2 labelAlto' : 'card-subtitle mb-2'}}>{{$reporte -> clasification}}</h6>
                        <p class="card-text">{{$reporte -> description}}</p>
                        <a href="{{route('Reportes.edit',$reporte->id)}}" class="buttonEditarReportes">Editar</a>
                    </div>
                </div>
            </div>

            @endforeach()
        </div>
    </div>
</main>
@endsection
