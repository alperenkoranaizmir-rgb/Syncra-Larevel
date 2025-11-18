@extends('layouts.admin')

@section('title','Yeni Kullanıcı')

@section('content')
<div class="card">
  <div class="card-header"><h3 class="card-title">Yeni Kullanıcı Oluştur</h3></div>
  <div class="card-body">
    @if($errors->any())<div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
    <form method="POST" action="{{ route('admin.users.store') }}">
      @csrf
      <div class="form-group"><label>İsim</label><input name="name" class="form-control" value="{{ old('name') }}" required></div>
      <div class="form-group"><label>E-posta</label><input name="email" type="email" class="form-control" value="{{ old('email') }}" required></div>
      <div class="form-row">
        <div class="form-group col-md-6"><label>Şifre</label><input name="password" type="password" class="form-control" required></div>
        <div class="form-group col-md-6"><label>Şifre (Tekrar)</label><input name="password_confirmation" type="password" class="form-control" required></div>
      </div>
      <div class="form-group form-check"><input type="checkbox" name="is_admin" value="1" class="form-check-input" id="is_admin"><label class="form-check-label" for="is_admin">Admin</label></div>

      @if(!empty($roles))
        <div class="form-group">
          <label>Roller</label>
          <select name="roles[]" class="form-control roles-select" multiple>
            @foreach($roles as $r)
              <option value="{{ $r }}" {{ in_array($r, old('roles', [])) ? 'selected' : '' }}>{{ $r }}</option>
            @endforeach
          </select>
          <small class="form-text text-muted">Ctrl/Shift ile çoklu seçim yapabilirsiniz.</small>
        </div>
      @endif
      <button class="btn btn-primary">Oluştur</button>
      <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">İptal</a>
    </form>
  </div>
</div>
@endsection
@extends('vendor.adminlte.layouts.admin')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header"><h3 class="card-title">Yeni Kullanıcı</h3></div>
    <div class="card-body">
      <form action="{{ route('admin.users.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label>İsim</label>
          <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
          <label>E-posta</label>
          <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Parola</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <div class="form-group col-md-6">
            <label>Parola (tekrar)</label>
            <input type="password" name="password_confirmation" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label>Kullanıcı Rol(ler)i</label>
          <select name="roles[]" class="form-control" multiple>
            @foreach($roles as $r)
              <option value="{{ $r }}">{{ $r }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group form-check">
          <input type="checkbox" name="is_admin" value="1" class="form-check-input" id="is_admin">
          <label class="form-check-label" for="is_admin">Site yöneticisi</label>
        </div>
        <button class="btn btn-primary">Oluştur</button>
      </form>
    </div>
  </div>
</div>
@endsection
