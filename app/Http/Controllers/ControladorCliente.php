<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ControladorCliente extends Controller
{
    private $cliente;

    public function __construct()
    {
        $this->cliente = new Cliente();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('projeto2.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projeto2.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:2|max:10|unique:clientes',
            'idade' => 'required',
            'endereco' => 'required|min:10',
            'email' => 'required|email|unique:clientes',
        ];

        $mensagens = [
            'required' => 'O campo :attribute é requerido',
            'unique' => 'Esse :attribute já foi cadastrado',

            //'nome.required' => 'O campo Nome é requerido',
            'nome.min' => 'O campo Nome deve ter no mínimo 2 caracteres',
            'nome.max' => 'O campo Nome deve ter no máximo 10 caracteres',
            //'nome.unique' => 'Esse nome já foi cadastrado',
            //'idade.required' => 'O campo Idade é requerido',
            //'endereco.required' => 'O campo Endereço é requerido',
            'endereco.min' => 'O campo Endereço deve ter no mínimo 10 caracteres',
            //'email.required' => 'O campo E-mail é requerido',
            'email.email' => 'Digite um endereço de e-mail válido',
            //'email.unique' => 'Esse e-mail já foi cadastrado'
        ];

        $request->validate($regras, $mensagens);

        /*
        $request->validate([
           'nome' => 'required|min:2|max:10|unique:clientes',
           'idade' => 'required',
           'endereco' => 'required|min:10',
           'email' => 'required|email',
        ]);
        */

        $this->cliente->nome = $request->input('nome');
        $this->cliente->idade = $request->input('idade');
        $this->cliente->endereco = $request->input('endereco');
        $this->cliente->email = $request->input('email');
        $this->cliente->save();
        return redirect()->route('projeto2.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
