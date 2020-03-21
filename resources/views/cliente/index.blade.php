@extends('layouts.principal')

@section('titulo', "Clientes")

@section('conteudo')

    <h3>{{$titulo}}</h3>

    <a href="{{route('cliente.create')}}">Novo Cliente</a>

    @if($clientes > 0)
        <ol>
            @foreach($clientes as $c)
                <ol>
                    {{$c['id']}} | {{$c['nome']}} |
                    <a href="{{route('cliente.show', $c['id'])}}">Mostrar</a> |
                    <a href="{{route('cliente.edit', $c['id'])}}">Editar</a> |
                    <form action="{{route('cliente.destroy', $c['id'])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-sm btn-danger" value="Deletar">
                    </form>
                </ol>
            @endforeach
        </ol>
    @endif

    @empty($clientes)
        <h4>Não há membros da Familia Botelho cadastrado!</h4>
    @endempty

@endsection