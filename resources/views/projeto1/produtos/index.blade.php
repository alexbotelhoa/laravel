@extends('layouts.projetos', ["current" => "produtos"])

@section('body')

    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Lista de Produtos</h5>
            <table class="table table-ordered table-hover" id="tabelaProdutos">
                <thead>
                <tr class="text-center">
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Estoque</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Opções</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary btn-sm" role="button" onclick="createProduto()">Cadastrar</button>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="modalProduto">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formProduto">
                    <div class="modal-header">
                        <h5 class="modal-title">Cadastrar Produto</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id" class="form-control">
                        <div class="form-group">
                            <label for="nomeProduto" class="control-label">Nome</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nomeProduto" placeholder="Nome do Produto">
                             </div>
                        </div>
                        <div class="form-group">
                            <label for="estoqueProduto" class="control-label">Estoque</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="estoqueProduto" placeholder="Estoque do Produto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="precoProduto" class="control-label">Preço</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="precoProduto" placeholder="Preço do Produto">|
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categoriaProduto" class="control-label">Categoria</label>
                            <div class="input-group">
                                <select class="form-control" id="categoriaProduto"></select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="salvar" type="submit" class="btn btn-success">Salvar</button>
                        <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        function indexProdutos() {
            $.getJSON('/laravel/public/api/projeto1/produtos', function (produto) {
                //console.log(produto);
                for (i = 0; i < produto.length; i++) {
                    row = linhaProduto(produto[i]);
                    $('#tabelaProdutos>tbody').append(row);
                }
            });
        }

        function linhaProduto(produto) {
            row = '<tr class="text-center">';
            row += '<td>' + produto.id + '</td>';
            row += '<td class="text-left">' + produto.nome + '</td>';
            row += '<td>' + produto.estoque + '</td>';
            row += '<td>' + produto.preco + '</td>';
            row += '<td>' + produto.categoria.nome + '</td>';
            row += '<td>';
            row += '<button class="btn btn-sm btn-light" onclick="showProduto(' + produto.id + ')"> Visualizar </button> ';
            row += '<button class="btn btn-sm btn-warning" onclick="editProduto(' + produto.id + ')"> Editar </button> ';
            row += '<button class="btn btn-sm btn-danger" onclick="deleteProduto(' + produto.id + ')"> Excluir </button> ';
            row += '</td>';
            row += '</tr>';
            return row
        }

        function listarCategorias() {
            $.getJSON('/laravel/public/api/projeto1/categorias', function (categoria) {
                //console.log(categoria);
                for (i = 0; i < categoria.length; i++) {
                    select = '<option value="' + categoria[i].id + '">' + categoria[i].nome + '</option>';
                    $('#categoriaProduto').append(select);
                }
            });
        }

        function createProduto() {
            $('#id').val('');
            $('#nomeProduto').attr('readonly', false).val('');
            $('#estoqueProduto').attr('readonly', false).val('');
            $('#precoProduto').attr('readonly', false).val('');
            $('#categoriaProduto').attr('disabled', false).val('');
            $('#modalProduto').modal('show');
            $('#salvar').show();
        }

        $("#formProduto").submit(function (event) {
            event.preventDefault();
            if ($('#id').val() != '') {
                updateProduto($('#id').val());
            } else {
                storeProduto();
            }
            $('#modalProduto').modal('hide');
        });

        function storeProduto() {
            produto = {
                nome: $('#nomeProduto').val(),
                estoque: $('#estoqueProduto').val(),
                preco: $('#precoProduto').val(),
                categoria_id: $('#categoriaProduto').val()
            };
            $.post("/laravel/public/api/projeto1/produtos", produto, function (data) {
                produto = JSON.parse(data);
                row = linhaProduto(produto);
                $('#tabelaProdutos>tbody').append(row);
            })
        }

        function showProduto(id) {
            $.getJSON('/laravel/public/api/projeto1/produtos/' + id, function (produto) {
                //console.log(produto);
                $('#id').val(produto.id);
                $('#nomeProduto').attr('readonly', true).val(produto.nome);
                $('#estoqueProduto').attr('readonly', true).val(produto.estoque);
                $('#precoProduto').attr('readonly', true).val(produto.preco);
                $('#categoriaProduto').attr('disabled', true).val(produto.categoria_id);
                $('#modalProduto').modal('show');
                $('#salvar').hide();
            });
        }

        function editProduto(id) {
            $.getJSON('/laravel/public/api/projeto1/produtos/' + id + '/edit', function (produto) {
                //console.log(produto);
                $('#id').val(produto.id);
                $('#nomeProduto').attr('readonly', false).val(produto.nome);
                $('#estoqueProduto').attr('readonly', false).val(produto.estoque);
                $('#precoProduto').attr('readonly', false).val(produto.preco);
                $('#categoriaProduto').attr('disabled', false).val(produto.categoria_id);
                $('#modalProduto').modal('show')
                $('#salvar').show();
            });
        }

        function updateProduto(id) {
            produto = {
                id: $('#id').val(),
                nome: $('#nomeProduto').val(),
                estoque: $('#estoqueProduto').val(),
                preco: $('#precoProduto').val(),
                categoria_id: $('#categoriaProduto').val()
            };
            $.ajax({
                type: "PUT",
                url: "/laravel/public/api/projeto1/produtos/" + id,
                context: this,
                data: produto,
                success: function (produto) {
                    produtoJSON = JSON.parse(produto);
                    //console.log(produtoJSON);
                    linhas = $("#tabelaProdutos>tbody>tr");
                    e = linhas.filter(function (i, elemento) {
                        return elemento.cells[0].textContent == produtoJSON.id;
                    });
                    if (e) {
                        e[0].cells[0].textContent = produtoJSON.id;
                        e[0].cells[1].textContent = produtoJSON.nome;
                        e[0].cells[2].textContent = produtoJSON.estoque;
                        e[0].cells[3].textContent = produtoJSON.preco;
                        e[0].cells[4].textContent = produtoJSON.categoria.nome;
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        function deleteProduto(id) {
            $.ajax({
                type: "DELETE",
                url: "/laravel/public/api/projeto1/produtos/" + id,
                context: this,
                success: function () {
                    linhas = $("#tabelaProdutos>tbody>tr");
                    e = linhas.filter(function (i, elemento) {
                        return elemento.cells[0].textContent == id;
                    });
                    if (e) e.remove();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        $(function () {
            indexProdutos();
            listarCategorias();
        });
    </script>

@endsection