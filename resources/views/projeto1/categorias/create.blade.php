@extends('layouts.projetos', ["current" => "categorias"])

@section('body')

    <h4>Categorias Adicionar</h4>

    <div class="card border">
        <div class="card-body">
            <form action="{{ route('categorias.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome da Categoria</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="reset" class="btn btn-secondary btn-sm">Cancelar</button>
            </form>
        </div>
    </div>

@endsection