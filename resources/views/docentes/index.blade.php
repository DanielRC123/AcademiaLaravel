@extends('layouts.app')

@section('titulo','Listado Docentes')
@section('contenido')
<br>
<h3> Aquí encontrará el listado de docentes registrados</h3>
    {{--  Con foreach hago el recorrido al array enviado. $cursito    --}}
    <div class="row">
    @foreach ( $docente as $alias )

        <div class="col-sm">
            <br>
            <div class="card text-center" style="width: 18rem; margin-top:20px">
    {{-- indicamos la foto y el nombre del docente, estos serán los que apareceran en el index de docentes --}}

                <img style="height:150px; width:250px; margin:20px" src="{{ Storage::url($alias->fotoPerfil) }}" class="card-img-top mx-auto d-block" alt="Imagen del curso">
                <div class="card-body">
                    <h5 class="card-title">{{$alias->nombre}}</h5>
                    <a href="/docentes/{{$alias->id}}" class="btn btn-dark">Ver mas</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>

@endsection
