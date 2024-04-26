@extends('layouts.dash')
@section('tittle','Dashboard')
@section('content')
<div id="layoutSidenav_content" class="bg-light">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">PANEL</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Bienvenido</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                        <div class="card bg-dark text-primary mb-4">
                        <div class="card-body">Tramites</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('tramites.index') }}">Ver más</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Tipos</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('tipos.index') }}">Ver más</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                        
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-secondary text-white mb-4">
                        <div class="card-body">Dependencias</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('dependencias.index') }}">Ver más</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                
                <div class="col-xl-3 col-md-6">
    <div class="card bg-dark text-white mb-4">
        <div class="card-body">Usuarios</div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="{{ route('users.index') }}">Ver más</a>
            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
    </div>
</div>

                
            </div>
        </div>
    </main>
</div>
@endsection