@extends('layouts.projetos', ["current" => "categorias"])

@section('body')

    <h4>Categorias Editar</h4>

    <div class="card border">
        <div class="card-body">
            <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nome">Nome da Categoria</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Categoria" value="{{ $categoria->nome }}">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            </form>
        </div>
    </div>

@endsection