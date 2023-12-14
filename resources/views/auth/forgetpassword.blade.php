@extends('layouts.components.layoutguest')
@section('title','Olvide mi Contraseña')
@section('content')
<!--Formulario -->
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-6 m-5">
            <div class="card text-white bg-negro-reportes">
                <div class="card-header"><label class="tituloPagina">Olvide mi contraseña</label></div>
                <div class="card-body">
                    @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <form action="{{ route('forget.password.post') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="email_address" class="col-md-4 col-form-label text-md-right">Correo</label>
                            <div class="col-md-6">
                                <input type="text" id="email_address" name="email" required autofocus class="form-control" placeholder="Correo Electronico">
                                @if ($errors->has('email'))
                                <span class="labelInicio">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button class="botoncrear" type="submit">
                                Restablecer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
