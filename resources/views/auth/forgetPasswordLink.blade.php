@extends('layouts.components.layoutguest')
@section('title','Nueva Contraseña')
@section('content')
<!--Formulario -->
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8 m-5">
            <div class="card text-white bg-negro-reportes">
                <div class="card-header"><label class="tituloPagina">@if ($new == 'true')
                        Crear Contraseña
                        @else
                        Restablecer Contraseña
                        @endif
                        </label></div>
                <div class="card-body">

                    <form action="{{ route('reset.password.post') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value=" {{$updatePassword->email}}">

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Nueva Contraseña</label>
                            <div class="col-md-6">
                                <input type="password" id="password" class="form-control" name="password" required autofocus>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Nueva Contraseña</label>
                            <div class="col-md-6">
                                <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
                                @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button class="botoncrear" type="submit">
                                Cambiar
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
