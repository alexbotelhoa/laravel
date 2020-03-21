@extends('layouts.projetos', ["current" => "produtos"])

@section('body')

    <h4>Produtos Editar</h4>

    <div class="card border">
        <div class="card-body">
            <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nome">Nome do Produto</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="{{ $produto->nome }}">
                </div>
                <div class="form-group">
                    <label for="estoque">Estoque</label>
                    <input type="text" class="form-control" name="estoque" id="estoque" value="{{ $produto->estoque }}">
                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" name="preco" id="preco" value="{{ $produto->preco }}">
                </div>
                <div class="form-group">
                    <label for="categoria_id">Categoria</label>
                    <input type="text" class="form-control" name="categoria_id" id="categoria_id" value="{{ $produto->categoria_id }}">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            </form>
        </div>
    </div>

@endsection