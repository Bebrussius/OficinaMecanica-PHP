@extends('layout')
@section('title', 'Tipos de Serviço')

@section('content')
    <div class="container mt-4 mb-4">
        <h1>Tipos de Serviço</h1>

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

        <a href="{{ route('serviceTypes.create') }}" class="btn btn-secondary mb-3">Adicionar Tipo de Serviço</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="align-middle">ID</th>
                    <th class="align-middle">Descrição</th>
                    <th class="align-middle">Preço</th>
                    <th class="align-middle">Tipo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($serviceTypes as $serviceType)
                    <tr>
                        <td class="align-middle">{{ $serviceType->servicoId }}</td>
                        <td class="align-middle">{{ $serviceType->descricao }}</td>
                        <td class="align-middle">{{ $serviceType->preco }}</td>
                        <td class="align-middle">{{ $serviceType->Tipo }}</td>
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