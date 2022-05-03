@extends('layouts.app')

@section('titulo','Completado')

@section('contenido')
    <div  class="text-center">
        {{-- modificamos el color del texto para hacerlo mas llamativo, llamamos a $tabla y a $estado --}}
        {{--
            $tabla = El nombre de la tabla con la que estamos trabajando.
            $estado = Indica si estamos creando o actualizando datos.
        --}}
        <h3 style="color:green;">{{$tabla}} {{$estado}} Correctamente</h3>

        {{-- Creamos el condicional if para saber con que tabla estamos trabajando --}}
        {{-- dentro de estos condicionales mostraremos los datos de la tabla --}}
        @if ($tabla=='Docente')
            <p class="card-text">{{$docente->nombre}}</p>
            <p class="card-text">{{$docente->edad}}</p>
            <img style="height:200px; width:250px; margin:15px" src="{{ Storage::url($docente->fotoPerfil) }}" class="card-img-top mx-auto d-block" alt="Imagen del docente">
            <p class="card-text">{{$docente->titulo}}</p>
        @else
            <p class="card-text">{{$cursito->nombre}}</p>
            <img style="height:200px; width:250px; margin:15px" src="{{ Storage::url($cursito->imagen) }}" class="card-img-top mx-auto d-block" alt="Imagen del curso">
            <p class="card-text">{{$cursito->descripcion}}</p>
        @endif

    </div>

@endsection
