@extends('layouts.dash')
@section('content')
<div class="container">
  <div class="m-5">
    <h1>Perfil de 
      {{ Auth::user()->name }}
    </h1>
    <ol class="breadcrumb mb-4">
      <a class="breadcrumb-item active" href="/admin">Atras</a>
    </ol> 
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Foto de perfil</th>
          <th scope="col">Nombres</th>
          <th scope="col">Apellidos</th>
          <th scope="col">Correo</th>
          <th scope="col">Telefono</th>
          <th scope="col">Fecha de Creacion</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ Auth::user()->id }}</td>
          <td><img src="{{ Auth::user()->image }}"width="150" height="150"></td>    
          <td>{{ Auth::user()->name }}</td>
          <td>{{ Auth::user()->surname }}</td>
          <td>{{ Auth::user()->email }}</td>
          <td>{{ Auth::user()->phone }}</td>
          <td>{{ Auth::user()->created_at }}</td>
          <td>
            <a href="{{ route('PerfilEditar', ['id' => Auth::user()->id])}}" class="btn btn-primary">Editar</a>       
            <form action="{{route('ProfileDelete', ['id' => Auth::user()->id])}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</main>
@endsection