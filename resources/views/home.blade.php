@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard - Usuário</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <p><a href="/laravel/public/variavel/SIM">Mostrar retorno de variáveis em URL</a></p>
                        <p><a href="/laravel/public/regras/alex/10">Usar variáveis nas rotas de URL</a></p>
                        <p><a href="{{ route('app.alex') }}">Testar 'Rotas' com 'Views'</a></p>
                        <p><a href="{{ route('familia') }}">Testar 'Rotas' dos 'Controladores'</a></p>
                        <p><a href="{{ route('cliente.index') }}">Teste de CRUD</a></p>
                        <p><a href="{{ route('projeto1') }}">Projeto 1 - Categoria, Produtos e Autenticação</a></p>
                        <p><a href="{{ route('projeto2.index') }}">Projeto 2 - Alertas e Validações</a></p>
                        <p><a href="{{ route('projeto3.usuarios') }}">Projeto 3 - Testar Middlewares</a></p>
                        <p><a href="{{ route('projeto4.index') }}">Projeto 4 - ORM Muitos-para-Muitos</a></p>
                        <p><a href="{{ route('projeto5.index') }}">Projeto 5 - Projeto de paginação</a></p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
