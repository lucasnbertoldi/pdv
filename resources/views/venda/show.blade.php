@extends('base')
@section('conteudo')

<div class="row">
    <div class="col-md-12 text-right">
        <a href="{{route('venda.index')}}">Voltar</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="cliente_id">Cliente:</label>
            <input class="form-control" type="text" readonly value="{{$venda->nomeCliente}}">
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
                    <th class="text-center" scope="col">Quantidade</th>
                    <th class="text-right" scope="col">Preço Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                <tr>
                    <td>{{$produto->id}}</td>
                    <td>{{$produto->nome}}</td>
                    <td>{{$produto->valorUnitario}}</td>
                    <td class="text-center">{{$produto->quantidade}}</td>
                    <td class="text-right">{{$produto->valorTotal}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div class="text-right col-12">
        <h4>Valor Total: R$ {{$venda->valor}}</h4>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="observacoes">Observações:</label>
            <textarea value="{{$venda->observacoes}}" readonly name="observacoes" id="observacoes" rows="5" class="form-control"></textarea>
        </div>
    </div>
</div>
@endsection