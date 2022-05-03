@extends('layouts.app')
@section('titulo','Detalle Curso')
@section('contenido')
    <div class="text-center">
        <h3 class="text-center">Detalle del curso</h3>
        <img style="height:200px; width:250px; margin:15px" src="{{ Storage::url($cursito->imagen) }}" class="card-img-top mx-auto d-block" alt="Imagen del curso">
        <p class="card-text">{{$cursito->descripcion}}</p>
        <a href="/cursos/{{$cursito->id}}/edit" class="btn btn-primary">Editar</a>
        <form class="form-group" action="/cursos/{{$cursito->id}}" method="POST">
            @csrf
            {{-- El metodo DELETE le indica a Laravel que vamos a trabajar con el metodo destroy del controlador CursoController --}}
            @method('DELETE')
            <br>

            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    </div>

@endsection
