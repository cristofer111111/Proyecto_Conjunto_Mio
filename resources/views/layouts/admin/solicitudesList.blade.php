<title>Solicitudes</title>
@extends('layouts.components.layout')
@section('title','Solicitudes')
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
              <!--    <p class="texto">Servicio: </p> <select name="servicio_id" class="cajastexto">
                    @foreach($servicios as $servicio)
                    <option value="{{$servicio -> id}}">{{$servicio -> nombre}}</option>
                    @endforeach()
                </select>
                <p class="texto">Fecha: </p><input type="date" name="fecha" class="cajastexto">-->
            </div>

        </div><br>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>Apto / Torre</th>
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
                            <td>{{$solicitud -> apartamento}} / {{$solicitud -> torre_id}}</td>
                            <td>{{$solicitud -> nombre}}</td>
                            <td>{{$solicitud -> fecha_evento}}</td>
                            <td>{{$solicitud -> precio}}</td>
                            <td>{{$solicitud -> estado }}</td>
                            <td class="td-boton" aria-current={{ $solicitud -> estado == "Solicitado" ? '' : 'disabledtd' }}>
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal{{$solicitud->id}}" aria-current={{ $solicitud -> estado == "Solicitado" ? '' : 'disabled' }}>
                                    Ver solicitud
                                </button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$solicitud->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-dark text-white">
                                        <h5 class="card-title">{{$solicitud -> nombre}}</h5>
                                    </div>
                                    <div class="modal-body">
                                        <b>Apto / Torre: </b> <label>{{$solicitud -> apartamento}} / {{$solicitud -> torre_id}}</label> <br>
                                        <b>Servicio: </b> <label>{{$solicitud -> nombre}}</label><br>
                                        <b>Fecha de Evento: </b> <label>{{$solicitud -> fecha_evento}}</label><br>
                                        <b>Valor: </b> <label>{{$solicitud -> precio}}</label><br>
                                        <b>Estado: </b> <label>{{$solicitud -> estado }}</label><br>
                                        <b>Observaciones: </b> <label>{{$solicitud -> descripcion }}</label><br>
                                        <form action="{{route('Solicitudes.revisarUpdate',$solicitud->id)}}" enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <b for="formGroupExampleInput2">Respuesta:</b><br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="respuesta" id="respuesta" value="Aceptado">
                                                    <label class="form-check-label" for="Aceptar">Aceptar</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="respuesta" id="respuesta" value="Rechazado">
                                                    <label class="form-check-label" for="Rechazar">Rechazar</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <b for="formGroupExampleInput2">Observaciones:</b>
                                                <textarea class="form-control" required name="observacionesAdmin" rows="3"></textarea>
                                                @error('observaciones')
                                                <div class="invalid">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary">Guardar</button> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach()
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if($total >=1 )
    <div class="position-absolute  " style="z-index: 11;right:1%;top:13%">
        <div id="liveToast" class="toast fade show " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                <img src="{{ url('img/menu/mano.png')}}" alt="" class="imgIcon iconNotification rounded me-2">
                <strong class="me-auto"> Tienes {{ $total }} solicitudes pendientes</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close">X</button>
            </div>
        </div>
    </div>
    @endif
</main>
@endsection
