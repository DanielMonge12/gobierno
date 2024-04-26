@extends('layouts.dash')
@section('title', 'dependencias')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dependencias</h1>
            <ol class="breadcrumb mb-4">
                <a class="breadcrumb-item active" href='admin'>Regresar</a>
            </ol>
            <div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="mb-3">
                                <a href="{{ route('dependencias.Crear') }}" class="btn btn-success">Crear Dependencia</a>
                            </div>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Teléfono</th>
                                        <th>Dependencia</th>
                                        <th>Estado</th>
                                        <th>Usuario</th> <!-- Nuevo campo -->
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if ($dependencias)
                                    @foreach ($dependencias as $dependencia)
                                    <tr>
                                        <td>{{ $dependencia->id }}</td>
                                        <td>{{ $dependencia->nombre }}</td>
                                        <td>{{ $dependencia->correo }}</td>
                                        <td>{{ $dependencia->telefono }}</td>
                                        <td>{{ $dependencia->dependencia }}</td>
                                        <td>{{ $dependencia->estado }}</td>
                                        <td>{{ $dependencia->user_id }}</td> <!-- Mostrar el ID del usuario -->
                                        <td>
                                            <a href="{{ route('dependencias.Editar', ['id' => $dependencia->id]) }}" class="btn btn-primary">Editar</a>
                                            <form action="{{ route('dependencias.Delete', ['id' => $dependencia->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="8">No hay dependencias disponibles.</td> <!-- Ajustar colspan al nuevo campo -->
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
