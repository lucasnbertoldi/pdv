@extends('base')
@section('conteudo')
<form action="{{route('cliente.update', $cliente->id)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{route('cliente.index')}}">Voltar</a>
        </div>
    </div>
    @if($errors->any())
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger">
                <h6>Houve um erro ao atualizar o cliente, por favor, revise as informações e tente novamente.</h6>
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
                <input required maxlength="200" id="nome" name="nome" type="text" class="form-control" value="{{$cliente->nome}}">
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input required type="email" id='email' name="email" class="form-control" value="{{$cliente->email}}">
            </div>
            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select required name="sexo" id="sexo" class="form-control" value="{{$cliente->sexo}}">
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Outros">Outros</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary text-right" value="Atualizar">
        </div>
    </div>
</form>
@endsection