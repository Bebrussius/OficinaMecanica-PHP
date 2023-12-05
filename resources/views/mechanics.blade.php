@extends('layout')
@section('title', 'Oficina mecânica - Mecânicos')
@section('content')
    <div class="container mt-4 mb-4">
        <h1 style="color: #333;">Mecânicos</h1>

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

        <a href="{{ route('mechanics.create') }}" class="btn btn-primary mb-3" style="background-color: #555; border-color: #444;">Adicionar Mecânico</a>

        <table class="table table-bordered" style="background-color: #f5f5f5;">
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
            background-color: #6e6e6e;
            transition: width 0.3s ease; 
        }
    </style>
@endsection