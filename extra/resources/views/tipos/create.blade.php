@extends('layouts.dash')

@section('content')
<div class="container" style="margin-left: 200px;">
    <div class="mt-4 m-5">
        <h2 class="mt-4">Crear Tipo</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('tipos.index') }}">Regresar</a></li>
        </ol>
        
        <form action="{{ route('tipos.Create') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre (string)</label>
                <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="costo">Costo (int)</label>
                <input type="number" class="form-control" id="costo" name="costo" autocomplete="off" required>
            </div>
            <div class="form-group">
    <label for="dependencia_id">Dependencia</label>
    <select class="form-control" id="dependencia_id" name="dependencia_id" required>
        @foreach($dependencias as $dependencia)
            <option value="{{ $dependencia->id }}">{{ $dependencia->nombre }}</option>
        @endforeach
    </select>
</div>
            <div class="form-group">
                <label for="estado">Estado (activo/inactivo)</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo (string)</label>
                <input type="text" class="form-control" id="tipo" name="tipo" autocomplete="off" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear Tipo</button>
        </form>
    </div>
</div>
@endsection
