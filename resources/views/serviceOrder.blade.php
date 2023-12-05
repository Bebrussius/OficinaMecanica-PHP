@extends('layout')
@section('title', 'Oficina mecânica - Ordem de serviço')
@section('content')
    <div class="container mt-4 mb-4">
        <h1>Ordens de Serviço</h1>

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

                    // Configuração da barra de progresso
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

        <a href="{{ route('serviceOrder.create') }}" class="btn btn-secondary">Adicionar Ordem de Serviço</a>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Veículo</th>
                    <th>Defeito</th>
                    <th>Mecânico</th>
                    <th>Data de Entrada</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($serviceOrders as $serviceOrder)
                    <tr>
                        <td class="align-middle" style="color: #555;">{{ $serviceOrder->idOrdem }}</td>
                        <td class="align-middle" style="color: #555;">{{ $serviceOrder->customer->nome }}</td>
                        <td class="align-middle" style="color: #555;">{{ $serviceOrder->vehicle->modelo }} (Placa: {{ $serviceOrder->vehicle->placa }})</td>
                        <td class="align-middle" style="color: #555;">{{ $serviceOrder->defeito}}</td>
                        <td class="align-middle" style="color: #555;">{{ $serviceOrder->mechanic->nome }}</td>
                        <td class="align-middle" style="color: #555;">{{ $serviceOrder->dataEntrada }}</td>
                        <td class="align-middle" style="color: #555;">
                            <form action="{{ route('serviceOrder.delete', $serviceOrder->idOrdem) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary" onclick="return confirm('Tem certeza que deseja excluir esta ordem de serviço?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


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
            background-color: #6e6e6e;
            transition: width 0.3s ease;
        }
    </style>
@endsection