<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class ProdutoControlador extends Controller
{
    public function __construct()
    {
        //$this->middleware(\App\Http\Middleware\ProdutoAmin::class);
    }

    public function index()
    {
        $produtos = Produto::all();
        return $produtos->toJson();
    }
}
