<title>Editar Anuncio</title>
@extends('layouts.components.layout')
@section('title','Editar Aanuncio')
@section('content')
<main class="mainForm">
        <form action="{{route('Anuncios.update',$anuncios->id)}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="disabledTextInput">Titulo del anuncio : </label>
                <input type="text" required name="announceTitle" class="form-control" value="{{$anuncios->titulo}}">
                @error('announceTitle')
                <div class="invalid">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Usuarios Notificados</label>
                <select name="announcePersons" required class="form-control">
                    <option disabled>Seleccione</option>
                    <option value="Residentes"  {{ $anuncios -> usuarios_notificados == "Residentes" ? 'selected' : '' }}>Residentes</option>
                    <option value="Funcionarios"  {{ $anuncios -> usuarios_notificados == "Funcionarios" ? 'selected' : '' }}>Funcionarios</option>
                    <option value="Vigilantes"  {{ $anuncios -> usuarios_notificados == "Vigilantes" ? 'selected' : '' }}>Vigilantes</option>
                    <option value="Aseadores"  {{ $anuncios -> usuarios_notificados == "Aseadores" ? 'selected' : '' }}>Aseadores</option>
                    <option value="Todos"  {{ $anuncios -> usuarios_notificados == "Todos" ? 'selected' : '' }}>Todos</option>
                </select>
                @error('announcePersons')
                <div class="invalid">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Mensaje</label>
                <textarea class="form-control" required name="announceMessage" rows="4"> <?php echo htmlspecialchars($anuncios->mensaje); ?></textarea>
                @error('announceMessage')
                <div class="invalid">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button class="btn btn-light">Guardar</button> <a href="{{url('Anuncios')}}" class="btn btn-dark"> Cancelar</a>
        </form>
</main>
@endsection
