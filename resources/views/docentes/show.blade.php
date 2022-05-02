@extends('layouts.app')
@section('titulo','Detalle Docente')
@section('contenido')
    <div class="text-center">
        <h3 class="text-center">Detalles del Docentes</h3>
        <img style="height:200px; width:250px; margin:15px" src="{{ Storage::url($docente->fotoPerfil) }}" class="card-img-top mx-auto d-block" alt="Imagen del docente">
        <p class="card-text">{{$docente->titulo}}</p>
        <p class="card-text">{{$docente->edad}}</p>

        <a href="/docentes/{{$docente->id}}/edit" class="btn btn-danger">Editar</a>
    </div>

@endsection
