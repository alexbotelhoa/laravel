@extends('layouts.projetos', ["current" => "produtos"])

@section('body')

    <h4>Produtos Adicionar</h4>

    <div class="card border">
        <div class="card-body">
            <form action="{{ route('produtos.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome do Produto</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
                </div>
                <div class="form-group">
                    <label for="estoque">Estoque</label>
                    <input type="text" class="form-control" name="estoque" id="estoque" placeholder="0">
                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" name="preco" id="preco" placeholder="0.00">
                </div>
                <div class="form-group">
                    <label for="categoria_id">Categoria</label>
                    <input type="text" class="form-control" name="categoria_id" id="categoria_id" placeholder="0">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="reset" class="btn btn-secondary btn-sm">Cancelar</button>
            </form>
        </div>
    </div>

@endsection