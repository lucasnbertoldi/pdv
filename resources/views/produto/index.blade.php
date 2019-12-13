@extends('base')
@section('conteudo')
<div class="row">
    <div class="col-md-12 text-right mb-2">
        <a href="/">Voltar</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <h4>Produtos:</h4>
    </div>
    <div class="col-12 table-responsive">
        <table class="table table-sm table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                <tr>
                    <th scope="row">{{$produto->id}}</th>
                    <td>{{$produto->nome}}</td>
                    <td>{{$produto->valor}}</td>
                    <td class="text-right">
                        <a class="btn btn-sm btn-primary" href="{{route('produto.edit',  $produto->id)}}">Editar</a>
                        <form style="display : inline;" method="POST" action="{{route('produto.destroy',  $produto->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4"><a class="btn btn-success btn-block" href="{{route('produto.create')}}">Cadastrar Novo Produto</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection