@extends('layouts.dash')

@section('content')
<div class="container" style="margin-left: 200px;">
    <div class="m-5">
        <h1>Editar Tipo</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('tipos.index') }}">Atrás</a></li>
        </ol>
        <div class="form-container">
            <form action="{{ route('tipos.Edit', $tipo->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Nombre (string)</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $tipo->nombre }}" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="costo">Costo (int)</label>
                    <input type="number" class="form-control" id="costo" name="costo" value="{{ $tipo->costo }}" required autocomplete="off">
                </div>
                <div class="form-group">
    <label for="dependencia_id">ID de Dependencia (int)</label>
    <select class="form-control" id="dependencia_id" name="dependencia_id" autocomplete="off" required>
        @foreach($dependencias as $dependencia)
            <option value="{{ $dependencia->id }}">{{ $dependencia->nombre }}</option>
        @endforeach
    </select>
</div>
                <div class="form-group">
                    <label for="estado">Estado (activo/inactivo)</label>
                    <select class="form-control" id="estado" name="estado" required>
                        <option value="activo" {{ $tipo->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                        <option value="inactivo" {{ $tipo->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo (string)</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" value="{{ $tipo->tipo }}" required autocomplete="off">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Tipo</button>
            </form>
        </div>
    </div>
</div>
@endsection
