@extends('layout')
@section('title', 'Oficina mecânica - Mecânicos')
@section('content')
    <div class="container mt-4 mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="mb-1">Mecânicos</h1>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('mechanics.create') }}" class="btn btn-secondary">Adicionar Mecânico</a>
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
        <table class="table table-bordered mt-3" style="background-color: #f5f5f5;">
            <thead>
                <tr>
                    <th class="align-middle" style="color: #555;">ID</th>
                    <th class="align-middle" style="color: #555;">Nome</th>
                    <th class="align-middle" style="color: #555;">Especialização</th>
                    <th class="align-middle" style="color: #555;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mechanics as $mechanic)
                    <tr>
                        <td class="align-middle">{{ $mechanic->idMecanico }}</td>
                        <td class="align-middle">{{ $mechanic->nome }}</td>
                        <td class="align-middle">{{ $mechanic->especializacao }}</td>
                        <td class="align-middle">
                            <form action="{{ route('mechanics.delete', $mechanic->idMecanico) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Tem certeza que deseja excluir este mecânico?')">
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