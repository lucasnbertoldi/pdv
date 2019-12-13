@extends('base')
@section('conteudo')
<div class="row">
    <div class="col-md-12 text-right mb-2">
        <a href="/">Voltar</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <h4>Clientes:</h4>
    </div>
    <div class="col-12 table-responsive">
        <table class="table table-sm table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Sexo</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <th scope="row">{{$cliente->id}}</th>
                    <td>{{$cliente->nome}}</td>
                    <td>{{$cliente->email}}</td>
                    <td>{{$cliente->sexo}}</td>
                    <td class="text-right">
                        <a class="btn btn-sm btn-primary" href="{{route('cliente.edit',  $cliente->id)}}">Editar</a>
                        <form style="display : inline;" method="POST" action="{{route('cliente.destroy',  $cliente->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="5"><a class="btn btn-success btn-block" href="{{route('cliente.create')}}">Cadastrar Novo Cliente</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection