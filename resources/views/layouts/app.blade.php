@extends('layouts.components.layout')
@section('title','Ultimos anuncios')
@section('content')
<main>
    <div class="container .me-md-3 ">
        @role('admin')
        <div class="grid m-2">
            <div class="g-col-4 g-start-6"><a href="Anuncios/create" class="buttonEditarReportes">Nuevo Anuncio </a></div>
        </div>
        @endrole
        <div class="row">
            @foreach($anuncios as $anuncio)
            <div class="col-sm-12 d-grid">
                <div class="m-2 card text-white bg-dark mb-3">
                    <div class="card-body">
                        <h5 class="card-title labelcolor">{{$anuncio -> titulo}}</h5>
                        <h6 class="card-subtitle mb-2">{{$anuncio -> usuarios_notificados}}</h6>
                        <p class="card-text">{{$anuncio -> mensaje}}</p>
                        @role('admin')
                        <form action="{{route('Anuncios.destroy',$anuncio->id)}}" method="post" class="form-anuncios">
                            @csrf
                            @method('DELETE')
                            <a href="{{route('Anuncios.edit',$anuncio->id)}}" class="buttonEditarReportes">Editar</a>
                            <button type="submit" class="buttonEditarReportes">Eliminar</button>
                        </form>
                        @endrole
                    </div>
                </div>
            </div>
            @endforeach()
        </div>
    </div>
</main>
@endsection
