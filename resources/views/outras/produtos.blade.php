@extends('layouts.principal')

@section('titulo', "Produtos")

@section('conteudo')

    <h3>Produtos</h3>

    <ul>
        <li>PC</li>
        <li>Notebook</li>
        <li>Mouse</li>
        <li>Camiseta</li>
    </ul>

    @component('components.alert', [
        'titulo' => "Mensagem de Informação",
        'tipo' => "info"
    ])
        <p>Mensagem</p>
    @endcomponent

    @directive_name()

    <br>

    @alert()

    <br>

    @alert()
        <p>Mensagem</p>
    @endalert

    @alert([
    'titulo' => "Mensagem de Atenção",
    'tipo' => "warning"
    ])
        <p>Mensagem</p>
    @endalert

    @alert([
        'titulo' => "Mensagem de Erro",
        'tipo' => "error"
    ])
        <p>Mensagem</p>
    @endalert

@endsection