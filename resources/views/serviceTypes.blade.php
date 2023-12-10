@extends('layout')
@section('title', 'Tipos de Serviço')

@section('content')
    <div class="container mt-4 mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="mb-1">Tipos de serviços</h1>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('serviceTypes.create') }}" class="btn btn-secondary">Adicionar Tipo de Serviço</a>
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
                    <th class="align-middle">Descrição</th>
                    <th class="align-middle">Preço</th>
                    <th class="align-middle">Tipo</th>
                    <th class="align-middle">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($serviceTypes as $serviceType)
                    <tr>
                        <td class="align-middle">{{ $serviceType->servicoId }}</td>
                        <td class="align-middle">{{ $serviceType->descricao }}</td>
                        <td class="align-middle">{{ $serviceType->preco }}</td>
                        <td class="align-middle">{{ $serviceType->Tipo }}</td>
                        <td class="align-middle" style="color: #555;">
                            <form action="{{ route('serviceTypes.delete', $serviceType->servicoId) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Tem certeza que deseja excluir este tipo de serviço?')">
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