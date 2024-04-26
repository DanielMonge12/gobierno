@extends('layouts.dash')

@section('content')
<div class="container">
<div class="form-container" style="margin-left: 100px;"> <!-- Alineación a la derecha -->
    <div class="m-5">
        <h1>Editar Perfil</h1>
        <ol class="breadcrumb mb-4">
            <a class="breadcrumb-item active" href="/perfil">Atras</a>
        </ol>
       
        
            <form action="{{ route('ProfileEdit', $users->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $users->name }}" required>
                    <label for="surname">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $users->telefono }}" required>
                    <label for="email">Correo</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $users->email }}" required>
                    <label for="phone">Ciudad</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $users->ciudad }}" required>
                    <label for="image">Curp</label>
                    <input type="text" class="form-control" id="curp" name="curp" value="{{ $users->curp }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
            </form>
        </div>
    </div>
</div>
@endsection
