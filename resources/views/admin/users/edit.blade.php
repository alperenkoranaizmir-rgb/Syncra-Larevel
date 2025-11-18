@extends('layouts.admin')

@section('title','Kullanıcı Düzenle')

@section('content')
<div class="card">
  <div class="card-header"><h3 class="card-title">Kullanıcı Düzenle</h3></div>
  <div class="card-body">
    @if($errors->any())<div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
    <form method="POST" action="{{ route('admin.users.update', $user) }}">
      @csrf
      @method('PUT')
      <div class="form-group"><label>İsim</label><input name="name" class="form-control" value="{{ old('name', $user->name) }}" required></div>
      <div class="form-group"><label>E-posta</label><input name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required></div>
      <div class="form-row">
        <div class="form-group col-md-6"><label>Şifre (boş bırakılırsa değişmez)</label><input name="password" type="password" class="form-control"></div>
        <div class="form-group col-md-6"><label>Şifre (Tekrar)</label><input name="password_confirmation" type="password" class="form-control"></div>
      </div>
      <div class="form-group form-check"><input type="checkbox" name="is_admin" value="1" class="form-check-input" id="is_admin" {{ $user->is_admin ? 'checked' : '' }}><label class="form-check-label" for="is_admin">Admin</label></div>

      @if(!empty($roles))
        <div class="form-group">
          <label>Roller</label>
          <div class="d-flex align-items-center">
            <select name="roles[]" class="form-control roles-select" multiple data-ajax-url="{{ url('/admin/roles/search') }}" data-preload-url="{{ url('/admin/users/'.$user->id.'/roles') }}" data-placeholder="Roller seçin">
              @foreach($roles as $r)
                <option value="{{ $r }}" {{ (method_exists($user, 'getRoleNames') && $user->getRoleNames()->contains($r)) || in_array($r, old('roles', [])) ? 'selected' : '' }}>{{ $r }}</option>
              @endforeach
            </select>
            <button type="button" class="btn btn-outline-secondary ml-2 create-role-btn" data-toggle="modal" data-target="#roleModal">Yeni Rol</button>
          </div>
          <small class="form-text text-muted">Mevcut roller seçili olarak gelir.</small>
        </div>
      @endif
      <button class="btn btn-primary">Kaydet</button>
      <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">İptal</a>
    </form>
  </div>
</div>
@endsection
@push('scripts')
<!-- Role create modal (shared with create view) -->
<div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Yeni Rol Oluştur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Kapat"><span aria-hidden="true">&times;</span></button>
      </div>
      <form id="role-create-form">
        <div class="modal-body">
          <div class="form-group">
            <label>Rol Adı</label>
            <input type="text" name="name" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
          <button type="submit" class="btn btn-primary">Oluştur</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endpush
@extends('vendor.adminlte.layouts.admin')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header"><h3 class="card-title">Kullanıcıyı Düzenle</h3></div>
    <div class="card-body">
      <form action="{{ route('admin.users.update', $user) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label>İsim</label>
          <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="form-group">
          <label>E-posta</label>
          <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Yeni Parola (boş bırakılırsa değiştirme)</label>
            <input type="password" name="password" class="form-control">
          </div>
          <div class="form-group col-md-6">
            <label>Parola (tekrar)</label>
            <input type="password" name="password_confirmation" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label>Kullanıcı Rol(ler)i</label>
          <select name="roles[]" class="form-control roles-select" multiple data-ajax-url="{{ url('/admin/roles/search') }}" data-placeholder="Roller seçin">
            @foreach($roles as $r)
              <option value="{{ $r }}" @if(in_array($r, $user->roles->pluck('name')->toArray())) selected @endif>{{ $r }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group form-check">
          <input type="checkbox" name="is_admin" value="1" class="form-check-input" id="is_admin" @if($user->is_admin) checked @endif>
          <label class="form-check-label" for="is_admin">Site yöneticisi</label>
        </div>
        <button class="btn btn-primary">Güncelle</button>
      </form>
    </div>
  </div>
</div>
@endsection
