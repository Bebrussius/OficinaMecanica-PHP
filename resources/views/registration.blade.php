@extends('layout')
@section('title','Oficina mecânica - Cadastro')
@section('content')
<div class="container">
    <form action="{{route('registration.post')}}" method="POST" class="ms-auto me-auto mt-3" style="width: 500px">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nome completo</label>
            <input type="text" class="form-control" name="name">
          </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email">
          <div id="emailHelp" class="form-text">Jamais compartilharemos seu e-mail com mais ninguém.</div>
        </div>
        <div class="mb-3">
          <label class="form-label">Senha</label>
          <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Cadastra-se</button>
    </form>
    <div class="container">
        @if($errors->any())
          <div class="ms-auto me-auto mt-3 col-6">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
          </div>
        @endif
                
        @if(session()->has('error'))
          <div class="alert alert-danger">{{session('error')}}</div>
        @endif

        @if(session()->has('sucess'))
        <div class="alert alert-sucess">{{session('sucess')}}</div>
      @endif
    </div>
</div>
@endsection