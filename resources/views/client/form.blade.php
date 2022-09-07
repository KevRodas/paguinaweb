@extends('themes.base')
@section('content')
<div class="container py-5 text-center">

    @if (isset($clients))
    <h1>Editar Cliente</h1>
    @else
        <h1>Crear Cliente</h1>
    @endif

    @if (isset($clients))
    <form action="{{ route('client.update', $clients) }}" method="post">
        @method('PUT')
    @else
    <form action="{{ route('client.store') }}" method="post">
    @endif

    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" name="name" class="form-control" placeholder="Ingrese Nombres" value="{{old('name') ?? @$clients->name}}" required>    
        <p class="form-text">Escriba sus nombres</p>
        @error('name')
        <p class="form-text text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" name="apellido" class="form-control" placeholder="Ingrese apellido"  value="{{old('apellido') ?? @$clients->apellido}}" required>    
        <p class="form-text">Escriba sus Apellidos</p>
        @error('apellido')
        <p class="form-text text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="deuda" class="form-label">Edad</label>
        <input type="number" name="deuda" class="form-control" placeholder="Escriba su edad" value="{{old('deuda') ?? @$clients->dueda}}" required>    
        <p class="form-text">Escriba su Edad</p>
        @error('dueda')
        <p class="form-text text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="puesto" class="form-label">Puesto</label>
        <input type="text" name="puesto" class="form-control" placeholder="Ingrese el puesto en el que labora"  value="{{old('puesto') ?? @$clients->puesto}}" required>    
        <p class="form-text">Ingrese su puesto</p>
        @error('puesto')
        <p class="form-text text-danger">{{$message}}</p>
        @enderror
    </div>
        <div class="mb-3">
            <label for="comments" class="form-label">Comentarios</label>
            <textarea name="comments" cols="30" rows="4"  class="form-control" value="{{old('comments') ?? @$clients->comments}}" required></textarea>
            <p class="form-text">Escriba algunos comentarios</p>
            @error('comments')
            <p class="from-text text-danger">{{$message}}</p>
        @enderror
          </div>
    </div>
    @if (isset($clients))
    <button type="submit" class="btn btn-info">Editar Usuarios</button>
    @else
    <button type="submit" class="btn btn-info">Guardar Usuarios</button>
    @endif
    
</form>    
@endsection
