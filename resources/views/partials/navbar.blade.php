<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand fs-3" href="#">Nafi-Jo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-5">
          <li class="nav-item">
            <a class="nav-link {{ ( $active === "home") ? 'active' : '' }}"  href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ( $active === "posts") ? 'active' : '' }}" href="/posts">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ( $active === "konsultasi") ? 'active' : '' }}" href="/konsultasi">Konsultasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ( $active === "kontak") ? 'active' : '' }}" href="/kontak">Kontak</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>