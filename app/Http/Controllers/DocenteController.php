<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Docente;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docente = Docente::all();
        return view('docentes.index',compact('docente')); //adjunto la información que quiero para la vista. dar uso de estos comandos
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('docentes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // all: me trae toda la informacion almacenada en request
        //return $request->all();
        //creamos una instancia del modelo para manipular la tabla Curso
        $docente = new Docente();
        // a travez de ka unstancia $docente llamo al campo nombre de la
        // tabla curso y le asigno el valor que viene del request
        $docente->nombre = $request->input('nombre');
        //hago lo mismo con el campo de descripcion
        $docente->titulo = $request->input('titulo');

        $docente->edad = $request->input('edad');

        /*
            Validamos si viene un archivo del campo image, es el name del input
            Luego en el campo imagen(de la base de datos) se almacenará el
            nombre del archivo uqe se va a guardar en storage/app/public e
            indicamos una subcarpeta de guardado para ser mas ordenados,
            en nuestro caso se llama cursos
        */
        if($request->hasFile('fotoPerfil')){
            $docente->fotoPerfil = $request->file('fotoPerfil')->store('public/docentes');
        }
        $docente->save();
        return 'Docente creado exitosamente';

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $docente = Docente::find($id);
        return view('docentes.show',compact('docente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $docente = Docente::where('id',$id)->firstOrFail();
        //return $docente;
        return view ('docentes.edit',compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $docente = Docente::find($id);
        /*
        Rellenar todos los campos del Curso con la info
        que viene en la petición o request
        */
        //  // Esta tecnica solo actualiza textos y numeros. Mas no puede actualizar valores binarios
        // $docente->fill($request->all());

        //Ahora excluimos al campo imagen del proceso de actualizacion de datos.
        $docente->fill($request->except('fotoPerfil'));

        // Ahora procesaremos la imagen de otra manera para su actualización.
        if($request->hasFile('fotoPerfil')){
            $docente->fotoPerfil = $request->file('fotoPerfil')->store('public/docentes');
        }
        // return $request;
        $docente->save();
        return 'Datos Del docente actualizados correctamente';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
