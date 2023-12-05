<!-- resources/views/serviceOrderCreate.blade.php -->
@extends('layout')
@section('title', 'Nova Ordem de Serviço')

@section('content')
    <div class="container">
        <h1 class="my-4">Nova Ordem de Serviço</h1>

        <form method="post" action="{{ route('serviceOrder.store') }}" class="mb-4">
            @csrf

            <div class="form-group">
                <label for="dataEntrada" class="dropdown-btn">Data de Emissão:</label>
                <input type="date" name="dataEntrada" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="cliente_nome">Nome do cliente:</label>
                <select name="cliente_nome" class="form-control" required>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->nome }}">{{ $customer->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="placa_veiculo">Placa do Veículo:</label>
                <select name="placa_veiculo" class="form-control" required>
                    @foreach($vehicles as $vehicle)
                        <option value="{{ $vehicle->placa }}">{{ $vehicle->placa }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nome_mecanico">Nome do Mecânico:</label>
                <select name="nome_mecanico" class="form-control" required>
                    @foreach($mechanics as $mechanic)
                        <option value="{{ $mechanic->nome }}">{{ $mechanic->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tipo_servico">Tipo de Serviço:</label>
                <select name="tipo_servico" class="form-control" required>
                    @foreach($serviceTypes as $serviceType)
                        <option value="{{ $serviceType->servicoId }}">{{ $serviceType->Tipo }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="peca">Peça:</label>
                <select name="peca" class="form-control" required>
                    @foreach($parts as $part)
                        <option value="{{ $part->idPeca }}">{{ $part->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="defeito">Defeito:</label>
                <textarea name="defeito" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Criar Ordem de Serviço</button>
        </form>
    </div>
@endsection