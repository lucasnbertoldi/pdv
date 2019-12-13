@extends('base')
@section('conteudo')
<script>
    let quantidadeProdutos = 0;
    let listaProdutos = [];
    let valorTotalVenda = 0;

    function abrirModal() {
        $('#modalAdicionarProduto').modal('show');
    }

    function adicionarProduto() {

        let quantidade = parseFloat($("#quantidadeAdicionar").val());
        if (isNaN(quantidade)) {
            $("#div-erro").show();
            $("#mensagem-erro").html("Por favor, digite um número válido.");
        } else {
            $("#tbodyAdicionarProduto").html(`
            <tr>
                <td colspan="5"><button type="button" data-toggle="modal" data-target="#modalAdicionarProduto" class="btn btn-success btn-block">Adicionar Produto</button></td>
            </tr>
       `);
            let id = $("#produtoAdicionar").val();
            let nome = $("#nomeProdutoAdicionar" + id).val();
            let valor = parseFloat($("#valorProdutoAdicionar" + id).val());
            let valorTotal = valor * quantidade;
            valorTotalVenda = valorTotalVenda + valorTotal;
            $('#span-valor-total').html(valorTotalVenda);
            quantidadeProdutos++;
            listaProdutos.push({
                id,
                nome,
                valor,
                quantidade,
                valorTotal
            });
            $("#quantiadeProdutos").val(quantidadeProdutos);
            for (let i = 0; i < listaProdutos.length; i++) {
                let produto = listaProdutos[i];
                $("#tbodyAdicionarProduto").prepend(`
            <tr>
                <td><input readonly class="form-control" type="text" name="idListaProduto${i}" id="idListaProduto${i}" value="${produto.id}"></td>
                <td><input readonly class="form-control" type="text" id="nomeListaProduto${i}" value="${produto.nome}"></td>
                <td><input readonly class="form-control" type="text" name="valorListaProduto${i}" id="valorListaProduto${i}" value="${produto.valor}"></td>
                <td><input readonly class="form-control" type="text" name="quantidadeListaProduto${i}" id="quantidadeListaProduto${i}" value="${produto.quantidade}"></td>
                <td><input readonly class="form-control" type="text" id="valorTotalListaProduto${i}" value="${produto.valorTotal}"></td>
            </tr>
        `);
            }

            $("#modalAdicionarProduto").modal("hide");
        }
    }
</script>
<form action="{{route('venda.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{route('venda.index')}}">Voltar</a>
        </div>
    </div>
    @if($errors->any())
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger">
                <h6>Houve um erro ao cadastrar a venda, por favor, revise as informações e tente novamente.</h6>
                <span class="small">
                    <p class="mb-1">Detalhes:</p>
                    <p>{{$errors->first()}}</p>
                </span>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="cliente_id">Cliente:</label>
                <select required name="cliente_id" id="cliente_id" class="form-control">
                    @foreach($clientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12">
            <h4>Produtos:</h4>
        </div>
        <div class="col-12">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Preço Total</th>
                    </tr>
                </thead>
                <tbody id="tbodyAdicionarProduto">
                    <tr>
                        <td colspan="5"><button onclick="abrirModal()" type="button" class="btn btn-success btn-block">Adicionar Produto</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="text-right col-12">
            <h4>Valor Total: R$ <span id='span-valor-total'>0</span></h4>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="observacoes">Observações:</label>
                <textarea name="observacoes" id="observacoes" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <input type="text" hidden name="quantidadeProdutos" id="quantiadeProdutos">
        <div class="col-12">
            <input type="submit" class="btn btn-success text-right" value="Cadastrar">
        </div>
    </div>
</form>
<div class="modal fade" id="modalAdicionarProduto" tabindex="-1" role="dialog" aria-labelledby="adicionarProdutoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adicionarProdutoLabel">Adicionar Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" id="div-erro" style="display: none">
                    <div class="col-12">
                        <div id="mensagem-erro" class="alert alert-danger">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="produtoAdicionar">Produto a Ser Adicionado:</label>
                            <select required name="produtoAdicionar" id="produtoAdicionar" class="form-control">
                                @foreach($produtos as $produto)
                                <option value="{{$produto->id}}">{{$produto->nome}} ({{$produto->valor}})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="quantidadeAdicionar">Quantidade</label>
                            <input type="text" class="form-control" id="quantidadeAdicionar" name="quantidadeAdicionar">
                        </div>
                    </div>
                    @foreach($produtos as $produto)
                    <input type="text" hidden id="nomeProdutoAdicionar{{$produto->id}}" value="{{$produto->nome}}">
                    <input type="text" hidden id="valorProdutoAdicionar{{$produto->id}}" value="{{$produto->valor}}">
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Fechar</button>
                <button onclick="adicionarProduto()" type="button" class="btn btn-success">Adicionar Produto</button>
            </div>
        </div>
    </div>
</div>
@endsection