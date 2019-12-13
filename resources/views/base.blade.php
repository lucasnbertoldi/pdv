<!DOCTYPE html>
<html lang="en">
<style>
    .bg {
        background: #00897B;
    }

    .card-img-top {
        max-height: 210px;
    }
</style>

<head>
    <title>Ponto de Venda</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg mb-4">
        <a class="navbar-brand" href="/">Ponto de Venda</a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('produto.index')}}">Produtos</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('cliente.index')}}">Clientes</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('venda.index')}}">Vendas</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <main role="main" class="container">
        @yield('conteudo')
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery-3.4.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>