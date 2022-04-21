<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: brown">
    <div class="container">
      <a class="navbar-brand" href="#">Pramuka</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($active === "home") ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "about") ? 'active' : '' }}" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "materis") ? 'active' : '' }}" href="/materis">Materi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "kategories") ? 'active' : '' }}" href="/kategories">Kategori</a>
          </li>
        </ul>
  
      <ul class="navbar-nav ms-auto">
          @auth
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Halo,{{ auth()->user()->name }}
            </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/dashboard"> <i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item"> 
                    <i class="bi bi-box-arrow-right"></i> Keluar </button>
                  </form>
                 </li>
              </ul>
            </li>
          @else
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link {{ ($judul === "Masuk") ? 'active' : '' }}" href="/masuk"> <i class="bi bi-box-arrow-in-right"> </i>Masuk</a>
            </li>
          </ul>
          @endauth
  
      </ul>
      </div>
    </div>
  </nav>