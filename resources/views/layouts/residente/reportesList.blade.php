<title>Mis Reportes</title>
@extends('layouts.components.layout')
@section('title','Mis Reportes')
@section('content')
<main>
    <div class="container ">
        <div class="row">
            <div class="col-md-12 m-2">
               <!--   <p class="info"> Puedes filtrar por clasificación</p>-->
            </div>
        </div>

        <div class="row">
            <div class="col-10">
              <!--    <p class="texto">Clasificación: </p> <select name="servicio_id" class="cajastexto">
                    <select name="clasification" required class="form-control">
                    </select>-->
            </div>
        </div><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>Clasificación</th>
                                <th>Título</th>
                                <th>Observacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($notificaciones as $notificacion)
                            <tr>
                                <td>{{$notificacion -> clasification}}</td>
                                <td>{{$notificacion -> titulo}}</td>
                                <td>{{$notificacion -> observaciones}}</td>
                            </tr>
                            @endforeach()
                        </tbody>
                    </table>
                </div>
            </div>

</main>
@endsection
