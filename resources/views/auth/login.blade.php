@extends('vendor.adminlte.layouts.auth')

@section('content')
  <div class="login-box">
    <div class="login-logo text-center">
      <a href="/{{ url('/') }}">
        <img src="{{ asset('images/logo.png') }}" alt="Syncra" class="brand-image img-circle elevation-3" style="opacity:.95;width:96px;height:96px;">
      </a>
      <h3 class="mt-2"><b>Syncra</b></h3>
      <p class="text-muted small mb-0">Yönetim Paneli — Hoşgeldiniz</p>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Oturum açmak için giriş yapın</p>

        @if(session('status'))
          <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @if($errors->any())
          <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('login.post') }}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="E-posta" required autofocus>
            <div class="input-group-append">
              <div class="input-group-text"><span class="fas fa-envelope"></span></div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Parola" required>
            <div class="input-group-append">
              <div class="input-group-text"><span class="fas fa-lock"></span></div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Beni hatırla</label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
            </div>
          </div>
        </form>

        <p class="mb-1 mt-3">
          <a href="{{ route('password.request') }}">Parolamı unuttum</a>
        </p>
        <p class="text-muted small mt-2">Yetkili kullanıcılar için erişim. Giriş bilgilerinizi güvenli tutun.</p>
      </div>
    </div>
  </div>
@endsection
