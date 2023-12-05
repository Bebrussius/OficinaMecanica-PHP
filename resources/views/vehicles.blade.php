@extends('layout')
@section('title','Oficina mecânica - Veículos')
@section('content')
    <div class="container mt-4 mb-4">
        <h1>Veículos</h1>

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

        <a href="{{ route('vehicles.create') }}" class="btn btn-secondary mb-3">Adicionar Veículo</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="align-middle">ID</th>
                    <th class="align-middle">Marca</th>
                    <th class="align-middle">Modelo</th>
                    <th class="align-middle">Ano</th>
                    <th class="align-middle">Placa</th>
                    <th class="align-middle">Cliente</th>
                    <th class="align-middle">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehicles as $vehicle)
                    <tr>
                        <td class="align-middle">{{ $vehicle->idVeiculo }}</td>
                        <td class="align-middle">{{ $vehicle->marca }}</td>
                        <td class="align-middle">{{ $vehicle->modelo }}</td>
                        <td class="align-middle">{{ $vehicle->ano }}</td>
                        <td class="align-middle">{{ $vehicle->placa }}</td>
                        <td class="align-middle">{{ $vehicle->customer->nome }}</td>
                        <td class="align-middle">
                            <!-- Adicione botões para editar e excluir conforme necessário -->
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