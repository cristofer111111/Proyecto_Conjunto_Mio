<title>Crear Reporte</title>
@extends('layouts.components.layout')
@section('title','Crear Reporte')
@section('content')
<!--pagina principal-->
<main class="mainForm">
    <form action="{{route('Reportes.store')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-group">
            <label for="disabledTextInput">Titulo del Reporte :</label>
            <input required type="text" name="title" class="form-control" placeholder="Titulo del reporte">
            @error('title')
            <div class="invalid">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Clasificación del Reporte</label>
            <select name="clasification"required class="form-control">
                <option disabled>Seleccione</option>
                <option value="Alto">Alto</option>
                <option value="Medio">Medio</option>
                <option value="Bajo">Bajo</option>
            </select>
            @error('clasification')
            <div class="invalid">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Descripción</label>
            <textarea class="form-control" required name="description" rows="4"></textarea>
            @error('description')
            <div class="invalid">
                {{$message}}
            </div>
            @enderror
        </div>
        <button class="btn btn-light">Guardar</button> <a href="{{url('Reportes')}}" class="btn btn-dark"> Cancelar</a>
    </form>
</main>
@endsection
