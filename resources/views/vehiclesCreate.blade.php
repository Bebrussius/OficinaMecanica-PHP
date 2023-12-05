@extends('layout')
@section('title', 'Oficina mecânica - Adicionar Veículo')
@section('content')
    <h1>Adicionar Veículo</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('vehicles.store') }}">
        @csrf
        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" class="form-control" id="marca" name="marca" required>
        </div>
        <div class="form-group">
            <label for="modelo">Modelo:</label>
            <input type="text" class="form-control" id="modelo" name="modelo" required>
        </div>
        <div class="form-group">
            <label for="ano">Ano:</label>
            <input type="number" class="form-control" id="ano" name="ano" required>
        </div>
        <div class="form-group">
            <label for="placa">Placa:</label>
            <input type="text" class="form-control" id="placa" name="placa" required>
        </div>
        <div class="form-group">
            <label for="idCliente">Cliente:</label>
            <select class="form-control" id="idCliente" name="idCliente" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->idCliente }}">{{ $customer->nome }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Veículo</button>
    </form>
@endsection
