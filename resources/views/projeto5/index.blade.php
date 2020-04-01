@extends('layouts.projetos5')

@section('body')


<div class="container">
    <div class="card text-center">
        <div class="card-header">
            Tabela de Alunos
        </div>
        <div class="card-body">
            <div class="card-title">Exibindo {{ $alunos->count() }} alunos de {{ $alunos->total() }} ({{ $alunos->firstItem() }} a {{ $alunos->lastItem() }})</div>
            <table class="table table-hover">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sobrenome</th>
                    <th scope="col">E-mail</th>
                </thead>
                <tbody>
                @foreach($alunos as $a)
                    <tr>
                        <td>{{ $a->id }}</td>
                        <td>{{ $a->nome }}</td>
                        <td>{{ $a->sobrenome }}</td>
                        <td>{{ $a->email }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="align-items-lg-center">{{ $alunos->links() }}</div>
        </div>
    </div>
</div>


@endsection