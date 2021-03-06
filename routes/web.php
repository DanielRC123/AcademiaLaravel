<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MiController;

use App\Http\Controllers\heladeria;


use App\Http\Controllers\ControladorPrecios;

use App\Http\Controllers\CursoController;

use App\Http\Controllers\InfoController;

use App\Http\Controllers\DocenteController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('miprimeraRuta', function () {
    return 'Bienvenido aprendices';
});

Route::get('minombre/{nombre}/edad/{edad}',function($nombre,$edad){
    return 'Hola mi nombre es: ' . $nombre . '<br> Tengo: ' . $edad . ' años';
});


Route::get('micontrolador/{nombre}', [MiController::class,'saludo']);


// A partir de aca es el taller


Route::get('heladeria/{tipo}', [heladeria::class,'helado']);


Route::get('precio/{precio}', [ControladorPrecios::class,'descuento']);

Route::get('iva/nombre/{nombre}/valor/{valor}', [ControladorPrecios::class,'getIVA']);



// Nuevo
Route::get('cursos/contacto',[InfoController::class,'info'],'contacto');


Route::resource('cursos',CursoController::class);

Route::get('nosotros',[InfoController::class,'info']);

Route::resource('docentes',DocenteController::class);

Route::get('contacto',[InfoController::class,'contacto']);

