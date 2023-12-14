<title>Crear Anuncio</title>
@extends('layouts.components.layout')
@section('title','Crear Anuncio')
@section('content')
<!--pagina principal-->
<main class="mainForm">
        <form action="{{route('Anuncios.store')}}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-group">
                <label for="disabledTextInput">Titulo del anuncio :</label>
                <input  required type="text" name="announceTitle" class="form-control" placeholder="Titulo del anuncio">
                @error('announceTitle')
                <div class="invalid">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Usuarios Notificados</label>
                <select name="announcePersons" required class="form-control" aria-placeholder="Seleccione">
                    <option disabled >Seleccione</option>
                    <option value="Residentes">Residentes</option>
                    <option value="Funcionarios">Funcionarios</option>
                    <option value="Vigilantes">Vigilantes</option>
                    <option value="Aseadores">Aseadores</option>
                    <option value="Todos">Todos</option>
                </select>
                @error('announcePersons')
                <div class="invalid">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Mensaje</label>
                <textarea class="form-control"  required name="announceMessage" rows="4"></textarea>
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
