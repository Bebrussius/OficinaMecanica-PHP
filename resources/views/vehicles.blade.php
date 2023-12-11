@extends('layout')
@section('title','Oficina mecânica - Veículos')
@section('content')
    <div class="container mt-4 mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="mb-1">Veículos</h1>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('vehicles.create') }}" class="btn btn-secondary">Adicionar Veículo</a>
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
                        <td class="align-middle">{{ optional($vehicle->customer)->nome }}</td>
                        <td class="align-middle">
                            <form action="{{ route('vehicles.delete', $vehicle->idVeiculo) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Tem certeza que deseja excluir este veículo?')">
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