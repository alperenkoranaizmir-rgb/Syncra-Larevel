<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Syncra') }} | Giriş</title>
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <style>body{background:#f4f6f9}</style>
</head>
<body class="hold-transition login-page">
  @yield('content')

  <script src="{{ asset('vendor/adminlte/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
  @stack('scripts')
</body>
</html>
