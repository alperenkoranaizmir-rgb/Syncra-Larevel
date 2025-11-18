@extends('vendor.adminlte.layouts.auth')

@section('content')
<div class="register-box">
  <div class="register-logo"><a href="/{{ url('/') }}"><b>Syncra</b> Kayıt</a></div>
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Yeni hesap oluşturun</p>
      <form action="#">
        <div class="input-group mb-3"><input class="form-control" placeholder="Full name"></div>
        <div class="input-group mb-3"><input class="form-control" placeholder="E-posta"></div>
        <div class="input-group mb-3"><input class="form-control" placeholder="Parola"></div>
        <button class="btn btn-primary btn-block">Kayıt Ol</button>
      </form>
    </div>
  </div>
</div>
@endsection
