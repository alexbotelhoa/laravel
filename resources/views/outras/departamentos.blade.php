@extends('layouts.principal')

@section('titulo', "Departamentos")

@section('conteudo')

    <h3>Departamentos</h3>

    <ul>
        <li>Computadores</li>
        <li>Eletrônicos</li>
        <li>Acessórios</li>
        <li>Roupas</li>
    </ul>

    @component('components.alert')
    @endcomponent

@endsection