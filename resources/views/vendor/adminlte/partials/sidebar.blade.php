<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="/" class="brand-link">
    <img src="{{ asset('vendor/adminlte/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image img-circle elevation-3">
    <span class="brand-text font-weight-light"><b>Syncra</b></span>
  </a>

  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        <li class="nav-item">
          <a href="/" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/admin/users" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>Kullanıcılar</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/profile" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Profil</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/admin/calendar" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>Takvim</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        <li class="nav-item">
            <a href="/" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                    Management
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/users" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Users</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
