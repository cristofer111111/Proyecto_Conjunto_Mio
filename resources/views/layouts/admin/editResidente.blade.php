<title>Editar usuario Residente</title>
@extends('layouts.components.layout')
@section('title','Editar usuario Residente')
@section('content')
<main class="mainForm">
        <form action="{{route('Residentes.update',$usuarios->id)}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="formGroupExampleInput">Nombre completo:</label>
                <input type="text" required class="form-control" name="nombre" value="{{$usuarios->name}}">
                @error('nombre')
                <div class="invalid">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Número de Identidad :</label>
                <input type="number" required class="form-control" name="cedula" value="{{$usuarios->document}}">
                @error('cedula')
                <div class="invalid">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Correo Electronico:</label>
                <input type="email" required class="form-control" name="email" value="{{$usuarios->email}}">
                @error('email')
                <div class="invalid">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Telefono:</label>
                <input type="number" required class="form-control" name="telefono" value="{{$usuarios->phone}}">
                @error('telefono')
                <div class="invalid">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Tipo de Residente :</label>
                <select name="tipo_residente" required class="form-control">
                    <option>Seleccione</option>
                    <option value="{{$residentes -> tipo_residente}}" {{ $residentes -> tipo_residente == "Propietario" ? 'selected' : '' }}>Propietario</option>
                    <option value="{{$residentes -> tipo_residente}}" {{ $residentes -> tipo_residente == "Arrendatario" ? 'selected' : '' }}>Arrendatario</option>
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
                    <select name="torre_id" required class="form-control">
                        @foreach($torres as $torre)
                        <option value="{{$torre -> id}}" {{ $residentes -> apto_id == $torre -> id ? 'selected' : '' }}>{{$torre -> torre}}</option>
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
                        <option value="{{$apto -> id}}" {{ $apto -> id == $residentes-> apto_id ? 'selected' : '' }}>{{$apto -> apartamento}}</option>
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
