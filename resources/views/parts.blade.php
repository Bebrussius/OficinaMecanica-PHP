@extends('layout')
@section('title', 'Oficina mecânica - Peças')
@section('content')
    <div class="container mt-4 mb-4">
        <h1>Peças</h1>

        @if(session('success'))
            <div class="alert alert-secondary">
                <div class="progress-container">
                    <div class="progress-bar progress-green" id="myBar"></div>
                </div>
                {{ session('success') }}
                <script>
                    setTimeout(function () {
                        var alert = document.querySelector('.alert');
                        alert.style.opacity = 0;

                        setTimeout(function () {
                            alert.style.display = 'none';
                        }, 1000);
                    }, 5000);

                    var progressBar = document.getElementById("myBar");
                    var width = 1;
                    var interval = setInterval(frame, 20);

                    function frame() {
                        if (width >= 100) {
                            clearInterval(interval);
                        } else {
                            width++;
                            progressBar.style.width = width + '%';
                        }
                    }
                </script>
            </div>
        @endif

        <a href="{{ route('parts.create') }}" class="btn btn-secondary mb-3">Adicionar Peça</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="align-middle">ID</th>
                    <th class="align-middle">Nome</th>
                    <th class="align-middle">Descrição</th>
                    <th class="align-middle">Preço</th>
                    <th class="align-middle">Quantidade</th>
                    <th class="align-middle">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($parts as $part)
                    <tr>
                        <td class="align-middle">{{ $part->idPeca }}</td>
                        <td class="align-middle">{{ $part->nome }}</td>
                        <td class="align-middle">{{ $part->descricao }}</td>
                        <td class="align-middle">{{ $part->preco }}</td>
                        <td class="align-middle">{{ $part->quantidade }}</td>
                        <td class="align-middle">
                            <!-- Substitua '#' pelos links e rotas adequados -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <style>
        .progress-container {
            width: 100%;
            height: 4px;
            background-color: #f1f1f1;
            margin-top: 10px;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .progress-bar {
            height: 100%;
            width: 1%;
            background-color: #6e6e6e; /* Cor cinza */
            transition: width 0.3s ease;
        }
    </style>
@endsection