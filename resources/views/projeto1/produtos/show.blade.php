@extends('layouts.projetos', ["current" => "produtos"])

@section('body')

    <h4>Produtos Visualizar</h4>

    <div class="card border">
        <div class="card-body">
            <form action="{{ route('produtos.index') }}" method="GET">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome do Produto</label>
                    <input type="text" class="form-control" name="nome" id="nome" readonly value="{{ $produto->nome }}">
                </div>
                <div class="form-group">
                    <label for="estoque">Estoque</label>
                    <input type="text" class="form-control" name="estoque" id="estoque" readonly value="{{ $produto->estoque }}">
                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" name="preco" id="preco" readonly value="{{ $produto->preco }}">
                </div>
                <div class="form-group">
                    <label for="categoria_id">Categoria</label>
                    <input type="text" class="form-control" name="categoria_id" id="categoria_id" readonly value="{{ $produto->categoria_id }}">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Voltar</button>
            </form>
        </div>
    </div>

@endsection