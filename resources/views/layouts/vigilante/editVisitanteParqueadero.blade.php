<title>Editar Visitante</title>
@extends('layouts.components.layout')
@section('title','Editar Visitante')
@section('content')
<main class="mainForm">
        <form action="{{route('Parqueadero.update',$visitantes->id)}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="formGroupExampleInput">Nombre completo:</label>
                <input type="text" required class="form-control" name="nombre" value="{{$visitantes->name}}">
                @error('nombre')
                <div class="invalid">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Número de Identidad :</label>
                <input type="text"required class="form-control" name="cedula" value="{{$visitantes->document}}">
                @error('cedula')
                <div class="invalid">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Telefono:</label>
                <input type="text" required class="form-control" name="telefono" value="{{$visitantes->phone}}">
                @error('telefono')
                <div class="invalid">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Placa:</label>
                <input type="text"required  class="form-control" name="placa" placeholder="Placa" value="{{$Parqueadero->placa}}">
                @error('placa')
                <div class="invalid">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="row">
                <div class="col">
                    <label for="formGroupExampleInput2">Torre :</label>
                    <select name="torre_id" required class="form-control">
                        @foreach($torres as $torre)
                        <option value="{{$torre -> id}}" {{ $visitantes -> apto_id == $torre -> id ? 'selected' : '' }}>{{$torre -> torre}}</option>
                        @endforeach()
                    </select>
                    @error('torre_id')
                    <div class="invalid">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="formGroupExampleInput2">Apartamento :</label>
                    <select name="apto_id" required class="form-control">
                        @foreach($aptos as $apto)
                        <option value="{{$apto -> id}}" {{ $apto -> id == $visitantes-> apto_id ? 'selected' : '' }}>{{$apto -> apartamento}}</option>
                        @endforeach()
                    </select>
                    @error('apto_id')
                    <div class="invalid">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <br>
            <button class="btn btn-light">Guardar</button> <a href="{{url('Visitantes/Parqueadero')}}" class="btn btn-dark"> Cancelar</a>
        </form>
</main>
@endsection
