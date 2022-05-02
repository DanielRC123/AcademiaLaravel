{{--En blade heredamos con @extends--}}
@extends('layouts.app')

@section('titulo','Crear Docente')

@section('contenido')
        <br>
        <h3 class="text-center">Crear nuevo Docente</h3>
        <form action="/docentes" method = "POST" enctype="multipart/form-data">

            @csrf {{-- csrf : Es una protección contra ataques malintencionados--}}

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
{{--
Esto era antes de heredar la plantilla

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario para crear</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <br>
        <h3 class="text-center">Creación de nuevo curso</h3>
        <form action="" method = "POST">
            <div class="form-group">
                <label for="nombre">Ingrese nombre del curso</label>
                <input id="nombre" class="form-control" type="text" name="nombre">
            </div>
            <div class="form-group">
                <label for="descrip">Ingrese una descripción del curso</label>
                <input id="descrip" class="form-control" type="text" name="descripcion">
            </div>
            <button class="btn btn-dark" type="submit">Crear</button>
        </form>
    </div>
</body>
</html>

 --}}