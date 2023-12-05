@extends('layout')
@section('title', 'Oficina mecânica - Adicionar Mecânico')
@section('content')
    <h1>Adicionar Mecânico</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('mechanics.store') }}">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="especializacao">Especialização:</label>
            <input type="text" class="form-control" id="especializacao" name="especializacao" required>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Mecânico</button>
    </form>
@endsection
