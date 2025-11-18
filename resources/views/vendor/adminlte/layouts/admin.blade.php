<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('adminlte.title', config('app.name')) }}</title>
    @vite(['resources/js/app.js'])
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="/" class="brand-link">
            <img src="{{ asset(config('adminlte.logo_img')) }}" alt="Logo" class="{{ config('adminlte.logo_img_class') }}">
            <span class="brand-text font-weight-light">{!! config('adminlte.logo') !!}</span>
        </a>

        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-item">
                        <a href="/" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content p-3">
            @yield('content')
        </section>
    </div>

    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
            Syncra
        </div>
        <strong>&copy; {{ date('Y') }} <a href="#">{{ config('app.name') }}</a>.</strong> All rights reserved.
    </footer>

</div>
</body>
</html>
