<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">{{config('app.name')}}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{route('serviceOrder')}}">Ordem de serviço</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('customers')}}">Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('vehicles')}}">Veículos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('parts')}}">Peças</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('mechanics')}}">Mecânicos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}">Sair</a>
          </li>
        </ul>
        <span class="navbar-text">
          Oficina mecânica
        </span>
      </div>
    </div>
  </nav>