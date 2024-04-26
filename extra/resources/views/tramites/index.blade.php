@extends('layouts.dash')

@section('content')
<div class="container" style="margin-left: 200px;">
    <div class="m-5">
        <h1>Trámites</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('tramites.index') }}">Atrás</a></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="mb-3">
                        <a href="{{ route('tramites.Crear') }}" class="btn btn-success">Crear Trámite</a>
                    </div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Tipo ID</th>
                                <th>Usuario ID</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Vencimiento</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tramites as $tramite)
                            <tr>
                                <td>{{ $tramite->id }}</td>
                                <td>{{ $tramite->nombre }}</td>
                                <td>{{ $tramite->tipo_id }}</td>
                                <td>{{ $tramite->usuario_id }}</td>
                                <td>{{ $tramite->fecha_inicio }}</td>
                                <td>{{ $tramite->fecha_vencimiento }}</td>
                                <td>
                                <a href="{{ route('tramites.Edit', $tramite->id) }}" class="btn btn-primary">Editar</a>
                                <form action="{{ route('tramites.Delete', $tramite->id) }}" method="POST">

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
</div>
@endsection
