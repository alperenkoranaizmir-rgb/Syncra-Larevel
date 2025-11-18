@extends('layouts.admin')

@section('title','Profilim')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Profil Bilgileri</h3>
  </div>
  <div class="card-body">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-striped">
      <tr><th>İsim</th><td>{{ $user->name }}</td></tr>
      <tr><th>E-posta</th><td>{{ $user->email }}</td></tr>
      <tr><th>Kullanıcı Adı</th><td>{{ $user->username }}</td></tr>
      <tr><th>Telefon</th><td>{{ $user->phone }}</td></tr>
      <tr><th>Şirket</th><td>{{ $user->company }}</td></tr>
      <tr><th>Doğum Tarihi</th><td>{{ optional($user->birthdate)->format('Y-m-d') }}</td></tr>
      <tr><th>TCKN</th><td>{{ $user->tckn }}</td></tr>
      <tr><th>Adres</th><td>{{ $user->address_city }} / {{ $user->address_district }}<br>{{ $user->address_line }}</td></tr>
      <tr><th>Eğitim</th><td>{{ $user->education }}</td></tr>
    </table>
    <div class="mt-3">
      <a href="{{ route('profile.edit') }}" class="btn btn-primary">Profili Düzenle</a>
    </div>
  </div>
</div>
@endsection
@extends('vendor.adminlte.layouts.admin')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">Profile</div>
    <div class="card-body">
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      <table class="table table-striped">
        <tr><th>Name</th><td>{{ $user->name }}</td></tr>
        <tr><th>Username</th><td>{{ $user->username }}</td></tr>
        <tr><th>Email</th><td>{{ $user->email }}</td></tr>
        <tr><th>Phone</th><td>{{ $user->phone }}</td></tr>
        <tr><th>Company</th><td>{{ $user->company }}</td></tr>
        <tr><th>Birthdate</th><td>{{ $user->birthdate }}</td></tr>
        <tr><th>T.C. Kimlik No</th><td>{{ $user->tckn }}</td></tr>
        <tr><th>Address</th><td>{{ $user->address_city }} / {{ $user->address_district }}<br>{{ $user->address_line }}</td></tr>
        <tr><th>Education</th><td>{{ $user->education }}</td></tr>
      </table>
      <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
    </div>
  </div>
</div>
@endsection
