@extends('base')
@section('conteudo')
<form action="{{route('produto.update', $produto->id)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{route('produto.index')}}">Voltar</a>
        </div>
    </div>
    @if($errors->any())
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger">
                <h6>Houve um erro ao atualizar o produto, por favor, revise as informações e tente novamente.</h6>
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
                <label for="nome">Nome:</label>
                <input required maxlength="200" id="nome" name="nome" type="text" class="form-control" value="{{$produto->nome}}">
            </div>
            <div class="form-group">
                <label for="valor">Valor:</label>
                <input required type="text" id='valor' name="valor" class="form-control" value="{{$produto->valor}}">
            </div>
            <input type="submit" class="btn btn-primary text-right" value="Salvar">
        </div>
    </div>
</form>
@endsection