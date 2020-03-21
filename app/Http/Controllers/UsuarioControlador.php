<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UsuarioControlador extends Controller
{
    public function __construct()
    {
        //$this->middleware('usuario');
    }

    public function index()
    {
        log::debug('Chamando o INDEX!!!');
        return view('projeto3.index');
    }
}
