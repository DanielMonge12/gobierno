@extends('layouts.dash')

@section('tittle','tipos')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tipos</h1>
            <ol class="breadcrumb mb-4">
                <a class="breadcrumb-item active" href='admin'>Regresar</a> 
            </ol>
            <div>
                
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="mb-3">
                            <!-- Cambia route('tipos.create') a route('tipos.Crear') -->
                            <a href="{{ route('tipos.Crear') }}" class="btn btn-success">Crear Tipo</a>
                        </div>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Costo</th>
                                    <th>Dependencia ID</th>
                                    <th>Estado</th>
                                    <th>Tipo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipos as $tipo)
                                <tr>
                                    <td>{{ $tipo->id }}</td>
                                    <td>{{ $tipo->nombre }}</td>
                                    <td>{{ $tipo->costo }}</td>
                                    <td>{{ $tipo->dependencia_id }}</td>
                                    <td>{{ $tipo->estado }}</td>
                                    <td>{{ $tipo->tipo }}</td>
                                    <td>
                                    <a href="{{ route('tipos.Editar', ['id' => $tipo->id]) }}" class="btn btn-primary">Editar</a>

                                        <form action="{{ route('tipos.Delete', ['id' => $tipo->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
