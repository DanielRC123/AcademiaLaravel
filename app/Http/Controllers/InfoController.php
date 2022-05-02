<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function info(){
        return view('varios.nosotros');
    }

    public function contacto()
    {
        return view('varios.contacto');
    }
}
