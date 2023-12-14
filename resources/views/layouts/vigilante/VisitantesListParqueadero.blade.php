<title>Visitantes con Parqueadero</title>
@extends('layouts.components.layout')
@section('title','Visitantes con Parqueadero')
@section('content')
<main>

    <div class="container ">
        <div class="row">
            <div class="col-md-12 m-2">
                <!--    <p class="info"> Puedes filtrar por torre y/o apartamento</p>-->
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <!--    <p class="texto">Torre: </p><input type="text" name="numeroTorre" class="cajastexto">
                <p class="texto">Apartamento: </p><input type="text" name="numeroApto" class="cajastexto">-->
            </div>
            <div class="col-2">
                <a href="{{url('Parqueadero/ReportePdf')}}" class="btn btn-light awidth">Generar PDF
                </a>
            </div>
            <div class="col-2">
                <a href="{{url('Visitantes/Parqueadero/create')}}" class="button button--hyperion"><span><span>Crear</span></span>
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Telefono</th>
                            <th>Apto/Torre</th>
                            <th>Placa</th>
                            <th>Fecha Entrada</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($visitantes as $visitante)
                        <tr>
                            <td>{{$visitante -> name}}</td>
                            <td>{{$visitante -> document}}</td>
                            <td>{{$visitante -> phone}} </td>
                            <td>{{$visitante -> apartamento}} / {{$visitante -> torre_id}}</td>
                            <td>{{$visitante -> placa}}</td>
                            <td>{{$visitante -> created_at}}</td>
                            <td>
                                <form action="{{route('Parqueadero.marcarSalida',$visitante->id)}}" method="post">
                                    @csrf
                                    <a href="{{route('Parqueadero.notificarResidente',$visitante->id)}}" class="btn btn-sm btn-light">Notificar</a>
                                    <a href="{{route('Parqueadero.edit',$visitante->id)}}" class="btn btn-sm btn-dark">Editar</a>
                                    <button type="submit" class="btn btn-sm btn-danger">Marcar Salida</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach()
                    </tbody>
                </table>
            </div>
        </div>

</main>
@endsection
