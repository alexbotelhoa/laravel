@extends('layouts.principal')

@section('conteudo')

    <h3>Visualizar Cliente</h3>

    <p>ID: {{$cliente['id']}}</p>
    <p>Nome: {{$cliente['nome']}}</p>
    <br>

    <a href="{{route('cliente.index')}}">Voltar</a>

@endsection