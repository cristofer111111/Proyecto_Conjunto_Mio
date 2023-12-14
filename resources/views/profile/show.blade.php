@extends('layouts.components.layout')
@section('title','perfil')
@section('content')
<main class="">
          <!--Botton Atras-->
          <div class="botonatras">
            <a href="javascript:history.back()"class="Atras"><img class="imgatras" src="../../img/previous.png" alt="BotÃƒÂ³n"/> Atras </a>
          </div><br><br>
            <div class="perfil">
                <div class="datos">
                  <h1>Perfil del usuario</h1>
                  <!--imagen grande del perfil-->
                  <img class="imagenperfil" src="../img/profile2.png" height="150" alt=""><br><br>
                    <!--campos de los del perfil del administrador-->
                    <!--|-------------------------------------------------------------------------------|-->

                    <div class="centrar">
                    <div class="form-group row">
                      <label class="col-sm-2"></label>
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Nombre:</label>
                      <div class="col-sm-4">
                        <label class="control" id="" >Alvaro Gomez</label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2"></label>
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Telefono:</label>
                      <div class="col-sm-4">
                        <label class="control" id="" >3154585949</label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2"></label>

                      <label for="inputEmail3" class="col-sm-4 col-form-label">Correo Electronico:</label>
                      <div class="col-sm-4">
                        <label class="control" id="" >AlvaroGomez@gmail.com</label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2"></label>
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Usuario:</label>
                      <div class="col-sm-4">
                        <label class="control" id="" >AlvaroGomez1</label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2"></label>
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Contraseña</label>
                      <div class="col-sm-4">
                        <label class="control" id="" >************</label>
                      </div>
                    </div>
                    <!--|-------------------------------------------------------------------------------|-->
                    <a href="cambiardatosperfil.html"><button>cambiar datos</button></a>
                </div><br>
              </div>
            </div>
        </main>

@endsection
