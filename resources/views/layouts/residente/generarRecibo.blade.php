<title>Recibo</title>
@extends('layouts.components.layout')
@section('title','Recibo')
@section('content')
<main class="mainForm">
    <form action="{{route('Solicitudes.pagarSolicitud',$solicitud->id)}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput2">Tipo de servicio :</label>
            <select name="servicio_id" class="form-control" disabled>
                @foreach($servicios as $servicio)
                <option value="{{$servicio -> id}}" {{ $solicitud -> servicio_id == $servicio -> id ? 'selected' : '' }}>{{$servicio -> nombre}}</option>
                @endforeach()
            </select>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Fecha:</label>
            <input disabled type="text" class="form-control" name="fecha" placeholder="fecha" value="{{$solicitud->fecha_evento}}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Observaciones:</label>
            <textarea disabled class="form-control" name="observaciones" rows="4"><?php echo htmlspecialchars($disponibilidad->descripcion); ?></textarea>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Observaciones del administrador:</label>
            <textarea disabled class="form-control" name="observacionesAdmin" rows="4"><?php echo htmlspecialchars($solicitud->observacionesAdmin); ?></textarea>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Valor del servicio:</label>
            <input disabled type="text" class="form-control" name="fecha" placeholder="fecha" value="{{$servicio->precio}}">
        </div>
        <button class="btn btn-light">Generar</button> <a href="{{url('Solicitudes/Admin')}}" class="btn btn-dark"> Cancelar</a>
    </form>
</main>
@endsection
