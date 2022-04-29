@extends('layouts.app')

@section('titulo','Listado Cursos')
@section('contenido')
<br>
<h3> Aquí encontrará el listado de cursos</h3>
    {{--  Con foreach hago el recorrido al array enviado. $cursito    --}}
    <div class="row">
    @foreach ( $cursito as $alias )

        <div class="col-sm">
            <br>
            <div class="card text-center" style="width: 18rem; margin-top:20px">
                <img style="height:150px width:250px; margin:20px" src="{{ Storage::url($alias->imagen) }}" class="card-img-top mx-auto d-block" alt="Imagen del curso">
                <div class="card-body">
                    <h5 class="card-title">{{$alias->nombre}}</h5>
                    <a href="/cursos/{{$alias->id}}" class="btn btn-dark">Ver mas</a>

                </div>
            </div>
        </div>
    @endforeach
    </div>

@endsection
