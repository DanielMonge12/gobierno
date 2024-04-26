@extends('layouts.dash')

@section('content')
<div class="container" style="margin-left: 200px;">
    <div class="m-5">
        <h1>Editar Trámite</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('tramites.index') }}">Atrás</a></li>
        </ol>
        <div class="form-container">
            <form action="{{ route('tramites.Editar', $tramite->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $tramite->nombre }}" required>
                </div>
                <div class="form-group">
    <label for="tipo_id">Tipo</label>
    <select class="form-control" id="tipo_id" name="tipo_id" required>
        @foreach($tipos as $tipo)
            <option value="{{ $tipo->id }}" {{ $tramite->tipo_id == $tipo->id ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="usuario_id">Usuario</label>
    <select class="form-control" id="usuario_id" name="usuario_id" required>
        @foreach($usuarios as $usuario)
            <option value="{{ $usuario->id }}" {{ $tramite->usuario_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
        @endforeach
    </select>
</div>

                <div class="form-group">
                    <label for="fecha_inicio">Fecha de Inicio</label>
                    <input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ $tramite->fecha_inicio }}" required>
                </div>
                <div class="form-group">
                    <label for="fecha_vencimiento">Fecha de Vencimiento</label>
                    <input type="text" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" value="{{ $tramite->fecha_vencimiento }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Trámite</button>
            </form>
        </div>
    </div>
</div>
@endsection
