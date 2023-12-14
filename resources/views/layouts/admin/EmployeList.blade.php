<title>Listado Funcionarios</title>
@extends('layouts.components.layout')
@section('title','Funcionarios')
@section('content')
<!--pagina principal-->
<main>
    <div class="container ">
        <div class="row">
            <div class="col-md-12 m-2">
              <!--    <p class="info"> Puedes filtrar por nombre y/o cargo</p>-->
            </div>
        </div>
        <div class="row">
            <div class="col-8">
             <!--   <p class="texto">Nombre: </p><input type="text" name="nombre" class="cajastexto">
                <p class="texto">Cargo: </p><input type="text" name="cargo" class="cajastexto">-->
            </div>
            <div class="col-2">
                <a href="{{url('Funcionarios/ReportePdf')}}" class="btn btn-light awidth">Generar PDF
                </a>
            </div>
            <div class="col-2">
                <a href="{{url('Usuarios/Funcionarios/create')}}" class="button button--hyperion"><span><span>Crear</span></span>
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
                            <th>NOMBRE</th>
                            <th>CARGO</th>
                            <th>CORREO ELECTRONICO</th>
                            <th>TELEFONO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario -> name}}</td>
                            <td>{{$usuario -> cargo}}</td>
                            <td>{{$usuario -> email}}</td>
                            <td>{{$usuario -> phone}}</td>
                            <td>
                                <form action="{{route('Funcionarios.destroy',$usuario->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('Funcionarios.show',$usuario->id)}}" class="btn btn-sm btn-light">Notificar</a>
                                    <a href="{{route('Funcionarios.edit',$usuario->id)}}" class="btn btn-sm btn-dark">Editar</a>
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach()
                    </tbody>
                </table>
            </div>
        </div>
    </div><br>
</main>
@endsection
