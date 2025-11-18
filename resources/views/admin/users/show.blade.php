@extends('layouts.admin')

@section('title','Kullanıcı Detayı')

@section('content')
<div class="card">
  <div class="card-header"><h3 class="card-title">Kullanıcı Detayı</h3></div>
  <div class="card-body">
    <table class="table">
      <tr><th>İsim</th><td>{{ $user->name }}</td></tr>
      <tr><th>E-posta</th><td>{{ $user->email }}</td></tr>
      <tr><th>Kullanıcı Adı</th><td>{{ $user->username }}</td></tr>
      <tr><th>Telefon</th><td>{{ $user->phone }}</td></tr>
      <tr><th>Admin</th><td>{{ $user->is_admin ? 'Evet' : 'Hayır' }}</td></tr>
    </table>
    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">Düzenle</a>
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Geri</a>
  </div>
</div>
@endsection
