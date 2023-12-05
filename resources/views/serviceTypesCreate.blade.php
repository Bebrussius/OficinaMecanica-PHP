@extends('layout')
@section('title', 'Adicionar Tipo de Serviço')

@section('content')
    <h1>Adicionar Tipo de Serviço</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('serviceTypes.store') }}">
        @csrf

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" class="form-control" id="descricao" name="descricao" required>
        </div>
        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="number" class="form-control" id="preco" name="preco" required>
        </div>
        <div class="form-group">
            <label for="Tipo">Tipo:</label>
            <input type="text" class="form-control" id="Tipo" name="Tipo" required>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar Tipo de Serviço</button>
    </form>
@endsection
