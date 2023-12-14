<title>Editar usuario Funcionario</title>
@extends('layouts.components.layout')
@section('title','Editar usuario Funcionario')
@section('content')
<main class="mainForm">
    <form action="{{route('Funcionarios.update',$usuarios->id)}}" enctype="multipart/form-data" method="post">
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
            <input type="email"required  class="form-control" name="email" value="{{$usuarios->email}}">
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
            <label for="formGroupExampleInput2">Tipo de Empleado :</label>
            <select name="cargo" required class="form-control">
                <option disabled >Seleccione</option>
                <option value="{{$funcionario -> cargo}}" {{ $funcionario -> cargo == "Vigilante" ? 'selected' : '' }}>Vigilante</option>
                <option value="{{$funcionario -> cargo}}" {{ $funcionario -> cargo == "Aseador" ? 'selected' : '' }}>Aseador</option>
            </select>
            @error('cargo')
            <div class="invalid">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Observaciones:</label>
            <input type="text" required class="form-control" name="observaciones" value="{{$funcionario->observaciones}}">
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
