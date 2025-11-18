@extends('layouts.admin')

@section('title','Kullanıcılar')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h3 class="card-title">Kullanıcılar</h3>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Yeni Kullanıcı</a>
  </div>
  <div class="card-body">
    @if(session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
    <table class="table table-striped">
      <thead>
        <tr><th>#</th><th>İsim</th><th>E-posta</th><th>Roller</th><th>Admin</th><th>İşlemler</th></tr>
      </thead>
      <tbody>
        @foreach($users as $u)
          <tr>
            <td>{{ $u->id }}</td>
            <td>{{ $u->name }}</td>
            <td>{{ $u->email }}</td>
            <td>
              @if(method_exists($u, 'getRoleNames'))
                @foreach($u->getRoleNames() as $role)
                  <span class="badge badge-info mr-1">{{ $role }}</span>
                @endforeach
              @else
                -
              @endif
            </td>
            <td>{{ $u->is_admin ? 'Evet' : 'Hayır' }}</td>
            <td>
              <a href="{{ route('admin.users.edit', $u) }}" class="btn btn-sm btn-secondary">Düzenle</a>
              <form method="POST" action="{{ route('admin.users.destroy', $u) }}" style="display:inline-block" onsubmit="return confirm('Silinsin mi?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Sil</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mt-3">{{ $users->links() }}</div>
  </div>
</div>
@endsection
@extends('vendor.adminlte.layouts.admin')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h3 class="card-title">Kullanıcılar</h3>
      <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">Yeni Kullanıcı</a>
    </div>
    <div class="card-body">
      @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
      @endif
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>İsim</th>
            <th>E-posta</th>
            <th>Roller</th>
            <th>Admin</th>
            <th>İşlemler</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $u)
            <tr>
              <td>{{ $u->id }}</td>
              <td>{{ $u->name }}</td>
              <td>{{ $u->email }}</td>
              <td>{{ $u->roles->pluck('name')->join(', ') }}</td>
              <td>@if($u->is_admin) Evet @else Hayır @endif</td>
              <td>
                <a href="{{ route('admin.users.edit', $u) }}" class="btn btn-sm btn-secondary">Düzenle</a>
                <form action="{{ route('admin.users.destroy', $u) }}" method="post" style="display:inline" onsubmit="return confirm('Silmek istediğinizden emin misiniz?');">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-danger">Sil</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      {{ $users->links() }}
    </div>
  </div>
</div>
@endsection
