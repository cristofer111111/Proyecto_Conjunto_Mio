<title>Editar Reporte</title>
@extends('layouts.components.layout')
@section('title','Editar Reporte')
@section('content')
<main class="mainForm">
        <form action="{{route('Reportes.update',$reportes->id)}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="disabledTextInput">Titulo del Reporte :</label>
                <input type="text" name="title" required class="form-control" placeholder="Titulo del reporte" value="{{$reportes -> title}}">
                @error('title')
                <div class="invalid">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Clasificación del Reporte</label>
                <select name="clasification" required class="form-control">
                    <option disabled >Seleccione</option>
                    <option value="{{$reportes -> clasification}}" {{ $reportes -> clasification == "Alto" ? 'selected' : '' }}>Alto</option>
                    <option value="{{$reportes -> clasification}}" {{ $reportes -> clasification == "Medio" ? 'selected' : '' }}>Medio</option>
                    <option value="{{$reportes -> clasification}}" {{ $reportes -> clasification == "Bajo" ? 'selected' : '' }}>Bajo</option>
                </select>
                @error('clasification')
                <div class="invalid">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripción</label>
                <textarea class="form-control" required name="description" rows="4"><?php echo htmlspecialchars($reportes->description); ?></textarea>
                @error('description')
                <div class="invalid">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button class="btn btn-light">Guardar</button> <a href="{{url('Reportes')}}" class="btn btn-dark"> Cancelar</a>
        </form>
</main>
@endsection
