<title>Crear usuario Residente</title>
@extends('layouts.components.layout')
@section('title','Crear usuario Residente')
@section('content')
<main class="mainForm">
    <form action="{{route('Residentes.store')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Nombre completo:</label>
            <input type="text" required class="form-control" name="nombre" placeholder="Nombre">
            @error('nombre')
            <div class="invalid">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Número de Identidad :</label>
            <input type="number" required class="form-control" name="cedula" placeholder="Número de Identidad">
            @error('cedula')
            <div class="invalid">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Correo Electronico:</label>
            <input type="email" required class="form-control" name="email" placeholder="Correo Electronico">
            @error('email')
            <div class="invalid">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Telefono:</label>
            <input type="number" required class="form-control" name="telefono" placeholder="Telefono">
            @error('telefono')
            <div class="invalid">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Tipo Residente :</label>
            <select name="tipo_residente" required class="form-control">
                <option value="Propietario">Propietario</option>
                <option value="Arrendatario">Arrendatario</option>
            </select>
            @error('tipo_residente')
            <div class="invalid">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="row">
            <div class="col">
                <label for="formGroupExampleInput2">Torre :</label>
                <select name="torre_id"  required class="form-control">
                    @foreach($torres as $torre)
                    <option value="{{$torre -> id}}">{{$torre -> torre}}</option>
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
                    <option value="{{$apto -> id}}">{{$apto -> apartamento}}</option>
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
        <button class="btn btn-light">Guardar</button> <a href="{{url('Usuarios/Residentes')}}" class="btn btn-dark"> Cancelar</a>
    </form>
</main>
@endsection
