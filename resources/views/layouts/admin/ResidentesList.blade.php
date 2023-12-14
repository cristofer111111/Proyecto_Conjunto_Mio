<title>Listado Residente</title>
@extends('layouts.components.layout')
@section('title','Residentes')
@section('content')
<main>
    <div class="container ">
        <div class="row">
            <div class="col-12 md-1 m-2">
             <!--     <p class="info"> Puedes filtrar por torre y/o apartamento</p>-->
            </div>
        </div>

        <div class="row">
            <div class="col-8">
               <!--   <p class="texto">Torre: </p><input type="text" name="numeroTorre" class="cajastexto">
                <p class="texto">Apartamento: </p><input type="text" name="numeroApto" class="cajastexto">-->
            </div>
            <div class="col-2">
                <a href="{{url('ReportePdf')}}" class="btn btn-light awidth">Generar PDF
                </a>
            </div>
            <div class="col-2">
                <a href="{{url('Usuarios/Residentes/create')}}" class="button button--hyperion"><span><span>Crear</span></span>
                </a>
            </div>
        </div><br>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>Propietario</th>
                            <th>Tipo Residente</th>
                            <th>Apto/Torre</th>
                            <th>Correo Electronico</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($residentes as $residente)
                        <tr>
                            <td>{{$residente -> name}}</td>
                            <td>{{$residente -> tipo_residente}}</td>
                            <td>{{$residente -> apartamento}} / {{$residente -> torre_id}}</td>
                            <td>{{$residente -> email}}</td>
                            <td>{{$residente -> phone}}</td>
                            <td class="td-boton">
                                <form action="{{route('Residentes.destroy',$residente->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal{{$residente->id}}">
                                        Notificar
                                    </button>
                                    <a href="{{route('Residentes.edit',$residente->id)}}" class="btn btn-sm btn-dark">Editar</a>
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$residente->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-dark text-white">
                                        <h5 class="card-title">Notificando al apto {{$residente -> apartamento}} / {{$residente -> torre_id}}</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('Residentes.notificar',$residente->id)}}" enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="disabledTextInput">Titulo:</label>
                                                <input required type="text" name="title" class="form-control" placeholder="Titulo">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Clasificación:</label>
                                                <select name="clasification" required class="form-control">
                                                    <option>Seleccione</option>
                                                    <option value="Alto">Alto</option>
                                                    <option value="Medio">Medio</option>
                                                    <option value="Bajo">Bajo</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Observaciones</label>
                                                <textarea class="form-control" required name="Observaciones" rows="4"></textarea>
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
</main>

@endsection
