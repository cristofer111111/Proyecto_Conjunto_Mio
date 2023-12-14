<title>Mis Solicitudes</title>
@if(Session::has('download.in.the.next.request'))
<meta http-equiv="refresh" content="5;url={{ Session::get('download.in.the.next.request') }}">
@endif
@extends('layouts.components.layout')
@section('title','Mis Solicitudes')
@section('content')
<main>
    <div class="container ">
        <div class="row">
            <div class="col-md-12 m-2">
                <!--   <p class="info"> Puedes filtrar por servicio y/o fecha</p>-->
            </div>
        </div>

        <div class="row">
            <div class="col-10">
                <!--   <p class="texto">Servicio: </p> <select name="servicio_id" class="cajastexto">
                    @foreach($servicios as $servicio)
                    <option value="{{$servicio -> id}}">{{$servicio -> nombre}}</option>
                    @endforeach()
                </select>
                <p class="texto">Fecha: </p><input type="date" name="fecha" class="cajastexto">-->
            </div>
            <div class="col-2">
                <a href="{{url('Solicitudes/create')}}" class="button button--hyperion"><span><span>Crear</span></span>
                </a>
            </div>
        </div><br>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table ">
                    <thead class="table-dark">
                        <tr>
                            <th>Servicio</th>
                            <th>Fecha</th>
                            <th>Valor</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($solicitudes as $solicitud)
                        <tr>
                            <td>{{$solicitud -> nombre}}</td>
                            <td>{{$solicitud -> fecha_evento}}</td>
                            <td>{{$solicitud -> precio}}</td>
                            <td>{{$solicitud -> estado }}</td>
                            <td class="td-boton">
                                <form action="{{route('Solicitudes.destroy',$solicitud->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div style="display: contents;" aria-current={{ $solicitud -> estado == "Aceptado" ? '' : 'disabledtd' }}>
                                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal{{$solicitud->id}}" aria-current={{ $solicitud -> estado == "Aceptado" ? '' : 'disabled' }}>
                                            Ver Info </button>
                                    </div>
                                    <a href=" {{route('Solicitudes.generarRecibo',$solicitud->id)}}" class="btn btn-light">Recibo
                                    </a>
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$solicitud->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-dark text-white">
                                        <h5 class="card-title">Servicio: {{$solicitud -> nombre}}</h5>
                                    </div>
                                    <div class="modal-body">
                                        <b>Fecha de Evento: </b> <label>{{$solicitud -> fecha_evento}}</label><br>
                                        <b>Valor: </b> <label>{{$solicitud -> precio}}</label><br>
                                        <b>Estado: </b> <label>{{$solicitud -> estado }}</label><br>
                                        <b>Observaciones: </b> <label>{{$solicitud -> descripcion }}</label><br>
                                        <b>Observaciones del administrador: </b> <label>{{$solicitud -> observacionesAdmin }}</label><br>

                                        <form action="{{route('Solicitudes.pagarSolicitud',$solicitud->id)}}" enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary">Generar Recibo</button> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </tr>
                        @endforeach()
                    </tbody>
                </table>
            </div>
        </div>
        @if($total >=1 )
        <div class="position-absolute  " style="z-index: 11;right:1%;top:13%">
            <div id="liveToast" class="toast fade show " role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body">
                    <img src="{{ url('img/menu/mano.png')}}" alt="" class="imgIcon iconNotification rounded me-2">
                    <strong class="me-auto"> Tienes {{ $total }} solicitudes pendientes por generar recibo</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close">X</button>
                </div>
            </div>
        </div>
        @endif
</main>
@endsection
