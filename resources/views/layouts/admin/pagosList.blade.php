<title>Pagos</title>
@extends('layouts.components.layout')
@section('title','Pagos')
@section('content')
<main>
    <div class="container ">
        <div class="row">
            <div class="col-md-12 m-2">
              <!--  <p class="info"> Puedes filtrar por servicio</p>-->
            </div>
        </div>

        <div class="row">
            <div class="col-10">
              <!--  <p class="texto">Servicio: </p> <select name="servicio_id" class="cajastexto">
                    @foreach($servicios as $servicio)
                    <option value="{{$servicio -> id}}">{{$servicio -> nombre}}</option>
                    @endforeach()
                </select>-->
            </div>
            <div class="col-2">
                <a href="{{url('ReportePdf/Pagos')}}" class="btn btn-light awidth">Generar PDF
                </a>
            </div>
        </div><br>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                        <th>Apto / Torre</th>
                            <th>Servicio</th>
                            <th>Fecha</th>
                            <th>Valor</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pagos as $pago)
                        <tr>
                        <td>{{$pago -> apartamento}} / {{$pago -> torre_id}}</td>
                            <td>{{$pago -> nombre}}</td>
                            <td>{{$pago -> fecha}}</td>
                            <td>{{$pago -> valor}}</td>
                            <td>{{$pago -> estado }}</td>
                        </tr>
                        @endforeach()
                    </tbody>
                </table>
            </div>
        </div>

</main>
@endsection
