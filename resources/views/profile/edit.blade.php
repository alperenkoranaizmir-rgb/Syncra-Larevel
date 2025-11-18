@extends('vendor.adminlte.layouts.admin')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header">Edit Profile</div>
    <div class="card-body">
      <form method="post" action="{{ route('profile.update') }}">
        @csrf
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="form-group">
          <label>Company</label>
          <input type="text" name="company" class="form-control" value="{{ old('company', $user->company) }}">
        </div>
        <div class="form-group">
          <label>Birthdate</label>
          <input type="date" name="birthdate" class="form-control" value="{{ old('birthdate', $user->birthdate) }}">
        </div>
        <button class="btn btn-primary">Save</button>
      </form>
    </div>
  </div>
</div>
@endsection
