@extends('layout')
@section('title','Oficina mecânica - Clientes')
@section('content')
    <div class="container mt-4 mb-4">
        <h1>Clientes</h1>

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

        <a href="{{ route('customers.create') }}" class="btn btn-secondary mb-3">Adicionar Cliente</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="align-middle">ID</th>
                    <th class="align-middle">Nome</th>
                    <th class="align-middle">Telefone</th>
                    <th class="align-middle">Email</th>
                    <th class="align-middle">Endereço</th>
                    <th class="align-middle">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td class="align-middle">{{ $customer->idCliente }}</td>
                        <td class="align-middle">{{ $customer->nome }}</td>
                        <td class="align-middle">{{ $customer->telefone }}</td>
                        <td class="align-middle">{{ $customer->email }}</td>
                        <td class="align-middle">{{ $customer->Endereco }}</td>
                        <td class="align-middle" style="color: #555;">
                            <form action="{{ route('customers.destroy', $customer->idCliente) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">Excluir</button>
                            </form>
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