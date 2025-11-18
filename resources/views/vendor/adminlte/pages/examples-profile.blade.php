@extends('vendor.adminlte.layouts.admin')

@section('content')
<div class="container-fluid">
  <h4>Profil</h4>
  <div class="row">
    <div class="col-md-4">
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <h3 class="profile-username text-center">{{ auth()->user()->name ?? 'Kullanıcı' }}</h3>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
