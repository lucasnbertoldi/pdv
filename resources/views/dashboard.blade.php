
@extends('base')
@section('conteudo')
<style>
    .card-img-top{
        max-height: 210px;
    }
</style>

<div class="row justify-content-between">

    <div class="col-md-4 col-xl-3">
        <div class="card">
        <img  class="card-img-top"  src="{{ asset('assets/produto.jpg') }}" alt="Produtos">
         <div class="card-body">
            <h5 class="card-title">Produtos</h5>
            <p class="card-text">Cadastre e consulte seus produtos.</p>
            <a class="btn btn-primary" href="{{route('produto.index')}}">Acessar</a>
          </div>
        </div>
    </div>

        <div class="col-md-4 col-xl-3">
        <div class="card">
        <img  class="card-img-top"  src="{{ asset('assets/cliente.jpg') }}" alt="Clientes">
         <div class="card-body">
            <h5 class="card-title">Clientes</h5>
            <p class="card-text">Cadastre e consulte seus clientes.</p>
            <a class="btn btn-primary" href="{{route('cliente.index')}}">Acessar</a>
          </div>
        </div>
    </div>

        <div class="col-md-4 col-xl-3">
        <div class="card">
        <img  class="card-img-top"  src="{{ asset('assets/venda.jpg') }}" alt="Vendas">
         <div class="card-body">
            <h5 class="card-title">Vendas</h5>
            <p class="card-text">Realize suas vendas.</p>
            <a class="btn btn-primary"  href="{{route('venda.index')}}">Acessar</a>
          </div>
        </div>
    </div>

</div>
@endsection
