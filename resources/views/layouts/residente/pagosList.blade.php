<title>Mis Pagos</title>
@extends('layouts.components.layout')
@section('title','Mis Pagos')
@section('content')
<main>
    <div class="container ">
        <div class="row">
            <div class="col-md-12 m-2">
               <!--   <p class="info"> Puedes filtrar por servicio</p>-->
            </div>
        </div>

        <div class="row">
            <div class="col-10">
               <!--   <p class="texto">Servicio: </p> <select name="servicio_id" class="cajastexto">
                    @foreach($servicios as $servicio)
                    <option value="{{$servicio -> id}}">{{$servicio -> nombre}}</option>
                    @endforeach()
                </select>-->
            </div>
            <div class="col-2">
                <a href="{{url('ReportePdf/MisPagos')}}" class="btn btn-light awidth">Generar PDF
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
                            <th>Servicio</th>
                            <th>Fecha</th>
                            <th>Valor</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pagos as $pago)
                        <tr>
                            <td>{{$pago -> nombre}}</td>
                            <td>{{$pago -> fecha}}</td>
                            <td>{{$pago -> valor}}</td>
                            <td>{{$pago -> estado }}</td>
                            <td class="td-boton" aria-current={{ $pago -> estado == "Pago pendiente" ? '' : 'disabledtd' }}>
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal{{$pago->id}}" aria-current={{ $pago -> estado == "Pago pendiente" ? '' : 'disabled' }}>
                                    Pagar
                                </button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$pago->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-dark text-white">
                                        <h5 class="card-title">Servicio: {{$pago -> nombre}}</h5>
                                    </div>
                                    <div class="modal-body">
                                        <b>Fecha de Evento: </b> <label>{{$pago -> fecha}}</label><br>
                                        <b>Valor: </b> <label>{{$pago -> valor}}</label><br>
                                        <b>Estado: </b> <label>{{$pago -> estado }}</label><br>
                                        <form>
                                        <script
            src="https://checkout.epayco.co/checkout.js"
            class="epayco-button"
            data-epayco-key="491d6a0b6e992cf924edd8d3d088aff1"
            data-epayco-amount="{{$pago->valor}}"
            data-epayco-name="{{$pago->nombre}}"
            data-epayco-description="{{$pago->nombre}}"
            data-epayco-currency="cop"
            data-epayco-country="co"
            data-epayco-test="true"
            data-epayco-external="false"
            data-epayco-response="{{route('MisPagos.confimacionRecibo',$pago->id)}}"
            data-epayco-confirmation="{{route('MisPagos.confimacionRecibo',$pago->id)}}"
            data-epayco-methodconfirmation="POST"
            data-epayco-button="{{ url('img/pagar.gif')}}">
        </script>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </tr>
                        @endforeach()
                    </tbody>
                </table>
            </div>
        </div>
        @if($total >=1 )
    <div class="position-absolute  " style="z-index: 11;right:1%;top:13%">
        <div id="liveToast" class="toast fade show " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                <img src="{{ url('img/menu/mano.png')}}" alt="" class="imgIcon iconNotification rounded me-2">
                <strong class="me-auto"> Tienes {{ $total }} pagos pendientes</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close">X</button>
            </div>
        </div>
    </div>
    @endif
</main>
<script type="text/javascript" src="https://checkout.epayco.co/checkout.js"></script>
@endsection
