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
