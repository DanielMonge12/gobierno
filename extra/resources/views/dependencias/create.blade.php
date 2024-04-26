@extends('layouts.dash')

@section('content')
<div class="container" style="margin-left: 200px;">
    <div class="m-5">
        <h2>Crear Dependencia</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dependencias.index') }}">Regresar</a></li>
        </ol>
        <div class="form-container">
            <form action="{{ route('dependencias.Create') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre (string)</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="correo">Correo (email)</label>
                    <input type="email" class="form-control" id="correo" name="correo" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono (int)</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="dependencia">Dependencia (string)</label>
                    <input type="text" class="form-control" id="dependencia" name="dependencia" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="estado">Estado (activo/inactivo)</label>
                    <input type="text" class="form-control" id="estado" name="estado" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="user_id">ID de Usuario</label> <!-- Nuevo campo -->
                    <input type="text" class="form-control" id="user_id" name="user_id" autocomplete="off" value="{{ Auth::id() }}" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Crear Dependencia</button>
            </form>
        </div>
    </div>
</div>
@endsection
