@extends('layout')
@section('title', 'Oficina mecânica - Adicionar Mecânico')
@section('content')
    <div class="container">
        <h1 class="my-4">Adicionar Mecânico</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('mechanics.store') }}" class="mb-4">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="especializacao">Especialização:</label>
                <input type="text" class="form-control" id="especializacao" name="especializacao" required>
            </div>
            <button type="submit" class="btn btn-secondary mt-3">Adicionar Mecânico</button>
        </form>
    </div>
@endsection
