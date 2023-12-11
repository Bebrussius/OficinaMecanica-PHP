@extends('layout')
@section('title', 'Oficina Mecânica - Login')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 mt-5">
      <div class="card">
        <div class="card-header">
          <h3 class="text-center">Faça Login</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Nome:</label>
              <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Senha:</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-secondary">Entrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center mt-3">
    <div class="col-md-6">
      @if($errors->any())
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </div>
      @endif

      @if(session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif

      @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
    </div>
  </div>
</div>
@endsection