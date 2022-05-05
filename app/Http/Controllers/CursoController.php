<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Http\Requests\CursoRequest;
class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con el metodo all traigo toda la información de la tabla como array
        $cursito = Curso::all();
        return view('cursos.index',compact('cursito')); //adjunto la información que quiero para la vista. dar uso de estos comandos
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Almacena un nuevo registro creado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoRequest $request)
    {
        // Implementación de validaciones para la tabla Cursos
        // $validacionDeDatos = $request->validate([
        //     'nombre'=>'required|max:10',
        //     'descripcion'=>'required|max:10',

        //     'imagen'=>'required|image'
        // ]);







        // all: me trae toda la informacion almacenada en request
        //return $request->all();
        //creamos una instancia del modelo para manipular la tabla Curso
        $cursito = new Curso();
        // a travez de ka unstancia $cursito llamo al campo nombre de la
        // tabla curso y le asigno el valor que viene del request
        $cursito->nombre = $request->input('nombre');
        //hago lo mismo con el campo de descripcion
        $cursito->descripcion = $request->input('descripcion');

        /*
            Validamos si viene un archivo del campo image, es el name del input
            Luego en el campo imagen(de la base de datos) se almacenará el
            nombre del archivo uqe se va a guardar en storage/app/public e
            indicamos una subcarpeta de guardado para ser mas ordenados,
            en nuestro caso se llama cursos
        */
        if($request->hasFile('imagen')){
            $cursito->imagen = $request->file('imagen')->store('public/cursos');
        }
        $cursito->save();
        $tabla = "Curso";
        $estado = "creado";
// Enviemos las dos nuevas variables creadas anteriormente, dichas variables serán usadas en el archivo esta.blade.php

        return view('estado',compact('tabla','cursito','estado'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cursito = Curso::find($id);
        return view('cursos.show',compact('cursito'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*Con firstOrFail capturo la excepción y muestra
        el primer registro encontrado en la tabla de la bd o lanza el error;*/
        $cursito = Curso::where('id',$id)->firstOrFail();
        //return $cursito;
        return view ('cursos.edit',compact('cursito'));
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
        $cursito = Curso::find($id);
        /*
        Rellenar todos los campos del Curso con la info
        que viene en la petición o request
        */
        //  // Esta tecnica solo actualiza textos y numeros. Mas no puede actualizar valores binarios
        // $cursito->fill($request->all());

        //Ahora excluimos al campo imagen del proceso de actualizacion de datos.
        $cursito->fill($request->except('imagen'));

        // Ahora procesaremos la imagen de otra manera para su actualización.
        if($request->hasFile('imagen')){
            $cursito->imagen = $request->file('imagen')->store('public/cursos');
        }
        // return $request;
        $cursito->save();
        $tabla = "Curso";
        $estado = "actualizado";
// Enviemos las dos nuevas variables creadas anteriormente, dichas variables serán usadas en el archivo esta.blade.php

        return view('estado',compact('tabla','cursito','estado'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cursito = Curso::find($id);
        $urlImagenBD = $cursito->imagen;

        $nombreImagen = str_replace('public/','\storage\\',$urlImagenBD);
        $rutaCompleta = public_path().$nombreImagen;
        // return $rutaCompleta;
        // // return $cursito;
        unlink($rutaCompleta);
        $cursito->delete();
        return 'eliminado';
    }

    public function contacto()
    {
        return view('varios.contacto');
    }
}
