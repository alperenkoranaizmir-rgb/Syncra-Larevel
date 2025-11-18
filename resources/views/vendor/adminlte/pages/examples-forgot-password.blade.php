@extends('vendor.adminlte.layouts.auth')

@section('content')
<div class="login-box">
  <div class="login-logo"><a href="/{{ url('/') }}"><b>Syncra</b></a></div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Parola sıfırlama isteği</p>
      <form action="#">
        <div class="input-group mb-3"><input class="form-control" placeholder="E-posta"></div>
        <button class="btn btn-primary btn-block">Gönder</button>
      </form>
    </div>
  </div>
</div>
@endsection
