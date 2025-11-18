@extends('vendor.adminlte.layouts.auth')

@section('content')
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo"><a href="#"><b>Syncra</b></a></div>
  <div class="lockscreen-item">
    <div class="lockscreen-image"><img src="{{ asset('images/logo.svg') }}" alt="user"></div>
    <form class="lockscreen-credentials">
      <input type="password" class="form-control" placeholder="Parola">
    </form>
  </div>
  <p class="help-block text-center">Parolanızı girin</p>
</div>
@endsection
