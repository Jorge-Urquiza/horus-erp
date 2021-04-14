<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
    
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span> Menu
      </button>
            <form action="#" class="searchform order-lg-last">
      <div class="form-group d-flex">
        <input type="text" class="form-control pl-3" placeholder="Search">
        <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
      </div>
    </form>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a href="#" class="nav-link">Inicio</a></li>
            <li class="nav-item"><a href="#about-section" class="nav-link">Acerca de Nosotros</a></li>
            <li class="nav-item"><a href="#servicios-section" class="nav-link">Servicios</a></li>
            <li class="nav-item"><a href="#blog-section" class="nav-link">Blog</a></li>
            <li class="nav-item"><a href="#contact-section" class="nav-link">Contactenos</a></li>
            @if (Route::has('login'))
                @auth
                    <li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a></li>
                @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                @endauth
            @endif
        </ul>
      </div>
    </div>
  </nav>