@extends('layouts.projetos', ["current" => "categorias"])

@section('body')

    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Categorias</h5>
            @if(count($categorias) > 0)
                <table class="table table-ordered table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome da Categoria</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorias as $c)
                            <tr>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->nome }}</td>
                                <td>
                                    <a href="{{ route('categorias.show', $c->id) }}" class="btn btn-light btn-sm">Visualizar</a>
                                    <a href="{{ route('categorias.edit', $c->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <a href="{{ route('categorias.destroy', $c->id) }}" class="btn btn-danger btn-sm">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            @empty($categorias)
                <h4>Não há registro de Categorias cadastradas!</h4>
            @endempty
        </div>
        <div class="card-footer">
            <a href="{{ route('categorias.create') }}" class="btn btn-success btn-sm">Cadastrar</a>
        </div>
    </div>

@endsection