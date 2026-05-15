<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-dark border-bottom" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}"><i class="bi bi-activity"></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('aboutUs') }}">Chi Siamo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contacts') }}">Contatta un GYMBRO</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="{{ route('services') }}">Tutti i nostri servizi</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="{{ route('tags.index') }}">Tutte le categorie</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="{{ route('services-create') }}">Crea un nuovo servizio</a>
        </li>
      

        <li class="nav-item dropdown">
          @auth
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Ciao, {{ auth()->user()->name }}</a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="{{ route('user.profile') }}">Il mio profilo</a>
              </li>
               <li>
                <a class="dropdown-item" href="{{ route('tags.create') }}">Crea un nuovo tag</a>
              </li>
              <li><a href="{{ route('logout') }}"
                  onclick="event.preventDefault(); document.getElementById('form-logout').submit();"
                  class="dropdown-item">Logout</a>
                <form id="form-logout" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>
            </ul>
          @else
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Ciao, Ospite!</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
              <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
            </ul>
          @endauth
        </li>



      </ul>
    </div>
  </div>
</nav>
<!-- navbar end -->