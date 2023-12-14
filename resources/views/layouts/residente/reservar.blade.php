<title>Reservar</title>
@extends('layouts.components.layout')
@section('title','Reservar')
@section('content')
<main class="mainForm">
<form action="{{route('Solicitudes.store')}}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-group">
                <label for="formGroupExampleInput2">Tipo de servicio :</label>
                <select name="servicio_id" required class="form-control">
                    @foreach($servicios as $servicio)
                    <option value="{{$servicio -> id}}">{{$servicio -> nombre}}</option>
                    @endforeach()
                </select>
                @error('servicio_id')
                <div class="invalid">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Fecha:</label>
                <input type="datetime-local" required class="form-control" name="fecha" placeholder="Nombre">
                @error('fecha')
                <div class="invalid">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Observaciones:</label>
                <textarea class="form-control" required name="observaciones" rows="4"></textarea>
                @error('observaciones')
                <div class="invalid">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button class="btn btn-light">Guardar</button> <a href="{{url('Solicitudes')}}" class="btn btn-dark"> Cancelar</a>
        </form>
</main>
@endsection
