@extends('vendor.adminlte.layouts.admin')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">Logout</div>
    <div class="card-body">
      <p>Are you sure you want to logout?</p>
      <form method="post" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-danger">Logout</button>
      </form>
    </div>
  </div>
</div>
@endsection
