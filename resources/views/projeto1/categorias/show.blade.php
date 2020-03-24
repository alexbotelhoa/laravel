@extends('layouts.projetos', ["current" => "categorias"])

@section('body')

    <h4>Categorias Visualizar</h4>

    <div class="card border">
        <div class="card-body">
            <form action="{{ route('projeto1.categorias') }}" method="GET">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome da Categoria</label>
                    <input type="text" class="form-control" name="nome" id="nome" readonly value="{{ $categoria->nome }}">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Voltar</button>
            </form>
        </div>
    </div>

@endsection