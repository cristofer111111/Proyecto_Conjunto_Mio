<title>Crear usuario Funcionario</title>
@extends('layouts.components.layout')
@section('title','Crear usuario Funcionario')
@section('content')
<main class="mainForm">
        <form action="{{route('Funcionarios.store')}}" enctype="multipart/form-data" method="post">
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
                <input type="email"  required class="form-control" name="email" placeholder="Correo Electronico">
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
                <label for="formGroupExampleInput2">Tipo de Empleado :</label>
                <select name="cargo" required class="form-control">
                    <option disabled>Seleccione</option>
                    <option value="Vigilante">Vigilante</option>
                    <option value="Aseador">Aseador</option>
                </select>
                @error('cargo')
                <div class="invalid">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Observaciones:</label>
                <input type="text" required class="form-control" name="observaciones" placeholder="Observaciones">
                @error('observaciones')
                <div class="invalid">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button class="btn btn-light">Guardar</button> <a href="{{url('Usuarios/Funcionarios')}}" class="btn btn-dark"> Cancelar</a>
        </form>
</main>
@endsection
