@extends('layouts.dash')

@section('content')
<div class="container" style="margin-left: 200px;">
    <div class="m-5">
        <h1>Crear Usuario</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Atrás</a></li>
        </ol>
        <div class="form-container">
            <form action="{{ route('users.Create') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" required autocomplete="name">
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required autocomplete="tel">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required autocomplete="email">
                </div>
                <div class="form-group">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" required>
                </div>
                <div class="form-group">
                    <label for="curp">CURP</label>
                    <input type="text" class="form-control" id="curp" name="curp" required>
                </div>
                <button type="submit" class="btn btn-primary">Crear Usuario</button>
            </form>
        </div>
    </div>
</div>
@endsection
