@extends('layouts.login')
@section('title','Iniciar Sesión')
@section('content')
<!--Formulario -->
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8 m-5">
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
            <div class="card text-white bg-negro-reportes">
                <div class="card-header"><label class="tituloPagina">Iniciar Sesión</label></div>
                <div class="card-body">
                    <form id="MyForm" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label id="email_address" class="col-md-4 col-form-label text-md-right">Correo</label>
                            <div class="col-md-6">
                                <input type="email" name="email" id="correo" pattern="[A-zA-Z0-9]+([.][a-zA-Z0-9]+)*@[a-zA-Z0-9]+([.][a-zA-Z0-9]+)[.][a-zA-Z0-9]{2,5})" class="form-control"   required autofocus placeholder="Correo Electronico">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label id="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                            <div class="col-md-6">
                                <input type="password" name="password" id="pass" class="form-control"  required  placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-4">
                        @if ($errors->has('email'))
                                <span class="labelInicio">{{ $errors->first('email') }}</span>
                                @endif
                            <button class="botoncrear" type="submit">
                                Ingresar
                            </button>
                            <a class="link" href=" {{ url('/forget-password') }}">Olvide mi Contraseña</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
