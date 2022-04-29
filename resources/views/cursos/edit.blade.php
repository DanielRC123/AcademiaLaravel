{{--En blade heredamos con @extends--}}
@extends('layouts.app')

@section('titulo','Editar curso')

@section('contenido')
        <br>
        <h3 class="text-center">Modificación de curso</h3>
        <form action="/cursos/{{$cursito->id}}" method = "POST" enctype="multipart/form-data">
            @csrf {{-- csrf : Es una protección contra ataques malintencionados--}}
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Ingrese nombre del curso</label>
                <input id="nombre" class="form-control" type="text" name="nombre" value="{{$cursito->nombre}}">
            </div>
            <div class="form-group">
                <label for="descrip">Modifique la descripción</label>
                <input id="descrip" class="form-control" type="text" name="descripcion" value="{{$cursito->descripcion}}">
            </div>
            <div class="form-group">
                <label for="imagen">Cargue una nueva imagen para el curso</label>
                <br>
                <input id="imagen"  type="file" name="imagen">
            </div>
            <img style="height:200px; width:250px; margin:left" src="{{ Storage::url($cursito->imagen) }}" class="card-img-top d-block" alt="Imagen del curso" style="align-content:left">

            <button class="btn btn-dark" type="submit">Actualizar</button>
        </form>

@endsection
