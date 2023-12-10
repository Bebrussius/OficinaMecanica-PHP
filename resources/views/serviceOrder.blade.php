@extends('layout')
@section('title', 'Oficina mecânica - Ordem de serviço')
@section('content')
    <div class="container mt-4 mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="mb-1">Ordens de Serviço</h1>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('serviceOrder.create') }}" class="btn btn-secondary">Adicionar Ordem de Serviço</a>
            </div>
        </div>

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
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Tem certeza que deseja excluir esta ordem de serviço?')">
                                    <i class="fas fa-trash"></i> 
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
