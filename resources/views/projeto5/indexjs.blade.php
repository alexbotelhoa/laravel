@extends('layouts.projetos5')

@section('body')

<div class="container">
    <div class="card text-center">
        <div class="card-header">
            Tabela de Alunos
        </div>
        <div class="card-body">
            <div class="card-title" id="cardTitle">Exibindo *10 alunos de *1000 (*10 a *1000)</div>
            <table class="table table-hover" id="tabelaAlunos">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sobrenome</th>
                    <th scope="col">E-mail</th>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="card-footer">
            <nav id="paginator">
                <ul class="pagination justify-content-center"></ul>
            </nav>
        </div>
    </div>
</div>

@endsection

@section('javascript')

    <script type="text/javascript">

        function indexAluno(page) {
            $.get('/laravel/public/projeto5/json', {page: page}, function (alunos) {
                console.log(alunos);
                montarTabela(alunos);
                montarPaginator(alunos);
                $("#paginator").find(">ul>li>a").click(function () {
                    indexAluno($(this).attr('page'));
                });
                $("#cardTitle").html(
                    "Exibindo " + alunos.per_page +
                    "alunos de " + alunos.total +
                    " ( " + alunos.from +
                    " a " + alunos.to +
                    " ) ")
            });
        }

        function montarTabela(alunos) {
            $('#tabelaAlunos').find('>tbody>tr').remove();
            for (a = 0; a < alunos.data.length; a++) {
                linha = montarLinha(alunos.data[a]);
                //console.log(linha);
                $('#tabelaAlunos').find('>tbody').append(linha);
            }
        }

        function montarLinha(aluno) {
            linha = '<tr>';
            linha += '<td>' + aluno.id + '</td>';
            linha += '<td>' + aluno.nome + '</td>';
            linha += '<td>' + aluno.sobrenome + '</td>';
            linha += '<td>' + aluno.email + '</td>';
            linha += '</tr>';
            return linha;
        }

        function montarPaginator(alunos) {
            $('#paginator').find('>ul>li').remove();
            $('#paginator').find('>ul').append(getItemPrev(alunos));

            n = 8;

            if (alunos.current_page - n/2 <= 1)
                inicio = 1;
            else if (alunos.last_page - alunos.current_page < n)
                inicio = alunos.last_page - n + 1;
            else
                inicio = alunos.current_page - n/2;

            fim = inicio + n - 1;
            for (p = inicio; p <= fim; p++) {
                page = getItem(alunos, p);
                console.log(page);
                $('#paginator').find('>ul').append(page);
            }
            $('#paginator').find('>ul').append(getItemNext(alunos));
        }

        function getItemPrev(alunos) {
            if (1 === alunos.current_page)
                page = '<li class="page-item disabled">';
            else
                page = '<li class="page-item">';
            page += '<a class="page-link" page="' + (alunos.current_page - 1) + '" href="javascript:void(0)">Prev</a></li>';
            return page;
        }

        function getItem(alunos, p) {
            if (p === alunos.current_page)
                page = '<li class="page-item active">';
            else
                page = '<li class="page-item">';
            page += '<a class="page-link" page="' + p + '" href="javascript:void(0)">' + p + '</a></li>';
            return page;
        }

        function getItemNext(alunos) {
            if (alunos.current_page === alunos.last_page)
                page = '<li class="page-item disabled">';
            else
                page = '<li class="page-item">';
            page += '<a class="page-link" page="' + (alunos.current_page + 1) + '" href="javascript:void(0)">Next</a></li>';
            return page;
        }

        $(function () {
            indexAluno();
        });

    </script>

@endsection