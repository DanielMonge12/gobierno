@extends('layouts.dash')

@section('content')
<div class="container" style="margin-left: 200px;">
    <div class="m-5">
        <h1>Editar Dependencia</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dependencias.index') }}">Atrás</a></li>
        </ol>
        <div class="form-container">
            <form action="{{ route('dependencias.Edit', $dependencia->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Nombre (string)</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $dependencia->nombre }}" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="correo">Correo (email)</label>
                    <input type="email" class="form-control" id="correo" name="correo" value="{{ $dependencia->correo }}" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono (int)</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $dependencia->telefono }}" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="dependencia">Dependencia (string)</label>
                    <input type="text" class="form-control" id="dependencia" name="dependencia" value="{{ $dependencia->dependencia }}" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="estado">Estado (activo/inactivo)</label>
                    <input type="text" class="form-control" id="estado" name="estado" value="{{ $dependencia->estado }}" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="user_id">ID de Usuario</label> <!-- Nuevo campo -->
                    <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $dependencia->user_id }}" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Dependencia</button>
            </form>
        </div>
    </div>
</div>
@endsection
