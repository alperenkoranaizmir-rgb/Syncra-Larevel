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
          <label>Username</label>
          <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}">
        </div>
        <div class="form-group">
          <label>Phone</label>
          <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
        </div>
        <div class="form-group">
          <label>Company</label>
          <input type="text" name="company" class="form-control" value="{{ old('company', $user->company) }}">
        </div>
        <div class="form-group">
          <label>Birthdate</label>
          <input type="date" name="birthdate" class="form-control" value="{{ old('birthdate', $user->birthdate) }}">
        </div>
        <div class="form-group">
          <label>T.C. Kimlik No</label>
          <input type="text" name="tckn" class="form-control" value="{{ old('tckn', $user->tckn) }}">
        </div>
        <div class="form-group">
          <label>City</label>
          <input type="text" name="address_city" class="form-control" value="{{ old('address_city', $user->address_city) }}">
        </div>
        <div class="form-group">
          <label>District</label>
          <input type="text" name="address_district" class="form-control" value="{{ old('address_district', $user->address_district) }}">
        </div>
        <div class="form-group">
          <label>Address</label>
          <textarea name="address_line" class="form-control">{{ old('address_line', $user->address_line) }}</textarea>
        </div>
        <div class="form-group">
          <label>Education</label>
          <select name="education" class="form-control">
            @php
              $levels = ['İlkokul','Ortaokul','Lise','Ön Lisans','Lisans','Yüksek Lisans','Doktora','MBA','Sertifika','Diğer'];
            @endphp
            <option value="">-- Select --</option>
            @foreach($levels as $lvl)
              <option value="{{ $lvl }}" {{ old('education', $user->education) == $lvl ? 'selected' : '' }}>{{ $lvl }}</option>
            @endforeach
          </select>
        </div>
        <button class="btn btn-primary">Save</button>
      </form>
    </div>
  </div>
</div>
@endsection
