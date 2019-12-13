@extends('base')
@section('conteudo')
<div class="row">
    <div class="col-md-12 text-right mb-2">
        <a href="/">Voltar</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <h4>Vendas Realizadas:</h4>
    </div>
    <div class="col-12 table-responsive">
        <table class="table table-sm table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Valor</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendas as $venda)
                <tr>
                    <th scope="row">{{$venda->id}}</th>
                    <td>{{$venda->nomeCliente}}</td>
                    <td>{{$venda->valor ?? 0}}</td>
                    <td class="text-right">
                        <a class="btn btn-sm btn-primary" href="{{route('venda.show',  $venda->id)}}">Visualizar</a>
                        <form style="display : inline;" method="POST" action="{{route('venda.destroy',  $venda->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4"><a class="btn btn-success btn-block" href="{{route('venda.create')}}">Cadastrar Nova Venda</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection