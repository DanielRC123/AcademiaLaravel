@extends('layouts.app')
@section('titulo','Detalle Docente')
@section('contenido')
    <div class="text-center">
        <h3 class="text-center">Detalles del Docentes</h3>
                {{-- mostramos la foto de perfil del docente, su titulo y su edad --}}

        <img style="height:200px; width:250px; margin:15px" src="{{ Storage::url($docente->fotoPerfil) }}" class="card-img-top mx-auto d-block" alt="Imagen del docente">
        <p class="card-text">{{$docente->titulo}}</p>
        <p class="card-text">{{$docente->edad}}</p>

        <a href="/docentes/{{$docente->id}}/edit" class="btn btn-danger">Editar</a>
        <form class="form-group" action="/docentes/{{$docente->id}}" method="POST">
            @csrf
            {{-- El metodo DELETE le indica a Laravel que vamos a trabajar con el metodo destroy del controlador CursoController --}}
            @method('DELETE')
            <br>

            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    </div>

@endsection
