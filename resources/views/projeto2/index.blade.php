@extends('layouts.projeto2', ["current" => "home"])

@section('body')

    <div class="row">
        <div class="container col-md-8 offset-md-2">
            <div class="card border">
                <div class="card-header">
                    <div class="card-title">
                        Listar Clientes
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <td>Código</td>
                            <td>Nome</td>
                            <td>Endereço</td>
                            <td>Idade</td>
                            <td>E-mail</td>
                        </tr>
                        </thead>
                        @if($clientes != '')
                            <tbody>
                                @foreach($clientes as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->nome }}</td>
                                        <td>{{ $value->endereco }}</td>
                                        <td>{{ $value->idade }}</td>
                                        <td>{{ $value->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @endif
                        <tfoot>
                        <tr>
                            <td colspan="5">
                                <a href="{{ route('projeto2.create') }}" class="btn btn-primary">Adicionar</a>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>




@endsection