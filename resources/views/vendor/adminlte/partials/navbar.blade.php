<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    @guest
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">Giriş</a>
      </li>
    @else
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <img src="{{ Auth::user()->avatar ?? asset('vendor/adminlte/img/avatar.png') }}" class="img-circle" alt="avatar" style="width:28px;height:28px;object-fit:cover;margin-right:6px;"> {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="{{ url('/profile') }}" class="dropdown-item">Profil</a>
          <div class="dropdown-divider"></div>
          <form method="POST" action="{{ url('/logout') }}" class="px-3">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger">Çıkış</button>
          </form>
        </div>
      </li>
    @endguest
  </ul>
</nav>
