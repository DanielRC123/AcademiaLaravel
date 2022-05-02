{{--En blade heredamos con @extends--}}
@extends('layouts.app')

@section('titulo','Editar Docente')

@section('contenido')
        <br>
        <h3 class="text-center">Modificación de curso</h3>
        <form action="/docentes/{{$docente->id}}" method = "POST" enctype="multipart/form-data">
            @csrf {{-- csrf : Es una protección contra ataques malintencionados--}}
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Ingrese el nuevo nombre del docente</label>
                <input id="nombre" class="form-control" type="text" name="nombre" value="{{$docente->nombre}}">
            </div>
            <div class="form-group">
                <label for="titulo">Modifique el titulo de los docentes</label>
                <input id="titulo" class="form-control" type="text" name="titulo" value="{{$docente->titulo}}">
            </div>
            <div class="form-group">
                <label for="edad">Modifique el titulo de los docentes</label>
                <input id="edad" class="form-control" type="text" name="edad" value="{{$docente->edad}}">
            </div>
            <div class="form-group">
                <label for="imagen">Cargue una nueva imagen para el Perfil del Docente</label>
                <br>
                <input id="imagen"  type="file" name="fotoPerfil">
            </div>
            <img style="height:200px; width:250px; margin:left" src="{{ Storage::url($docente->fotoPerfil) }}" class="card-img-top d-block" alt="Imagen del docente" style="align-content:left">

            <button class="btn btn-dark" type="submit">Actualizar</button>
        </form>

@endsection
