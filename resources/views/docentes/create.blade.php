{{--En blade heredamos con @extends--}}
@extends('layouts.app')

@section('titulo','Crear Docente')

@section('contenido')
        <br>
        <h3 class="text-center">Crear nuevo Docente</h3>

        {{--   Cambiamos el action, para indicarle al sistema que trabajaremos con la ruta /docentes  --}}
        <form action="/docentes" method = "POST" enctype="multipart/form-data">

            @csrf {{-- csrf : Es una protección contra ataques malintencionados--}}
            @if ($errors->any())
                @foreach ($errors->all() as $alerta)
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <li>{{$alerta}}</li>
                        </ul>
                    </div>
                @endforeach
                
            @endif

        {{--  Aca ambiamos el name="" de todos los campos que posea la tabla docente.   --}}


            <div class="form-group">
                <label for="nombre">Ingrese nombre del Docente</label>
                <input id="nombre" class="form-control" type="text" name="nombre">
            </div>
            <div class="form-group">
                <label for="descrip">Ingrese los titulos del Docente</label>
                <input id="descrip" class="form-control" type="text" name="titulo">
            </div>

            <div class="form-group">
                <label for="descrip">Ingrese la edad del Docente</label>
                {{-- Dado que la edad es un dato tipo int cambiamos el type del input a number  --}}

                <input id="descrip" class="form-control" type="number" name="edad">
            </div>
            <div class="form-group">
                <label for="imagen">Cargue una Foto de Perfil del Docente</label>
                <br>
                <input id="imagen"  type="file" name="fotoPerfil">
            </div>
            <button class="btn btn-dark" type="submit">Crear</button>
        </form>

@endsection
