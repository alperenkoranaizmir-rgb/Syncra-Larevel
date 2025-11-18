@extends('layouts.admin')

@section('title','Profil Düzenle')

@section('content')
<div class="card">
  <div class="card-header"><h3 class="card-title">Profili Düzenle</h3></div>
  <div class="card-body">
    @if($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
      @csrf
      <div class="form-group">
        <label>İsim</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
      </div>
      <div class="form-group">
        <label>E-posta</label>
        <input type="email" name="email" class="form-control" value="{{ $user->email }}" disabled>
      </div>
      <div class="form-group">
        <label>Kullanıcı Adı</label>
        <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}">
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Telefon</label>
          <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
        </div>
        <div class="form-group col-md-6">
          <label>Şirket</label>
          <input type="text" name="company" class="form-control" value="{{ old('company', $user->company) }}">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label>Doğum Tarihi</label>
          <input type="date" name="birthdate" class="form-control" value="{{ old('birthdate', optional($user->birthdate)->format('Y-m-d')) }}">
        </div>
        <div class="form-group col-md-4">
          <label>TCKN</label>
          <input type="text" name="tckn" class="form-control" value="{{ old('tckn', $user->tckn) }}">
        </div>
        <div class="form-group col-md-4">
          <label>Eğitim</label>
          <input type="text" name="education" class="form-control" value="{{ old('education', $user->education) }}">
        </div>
      </div>

      <div class="form-group">
        <label>Adres Şehir</label>
        <input type="text" name="address_city" class="form-control" value="{{ old('address_city', $user->address_city) }}">
      </div>
      <div class="form-group">
        <label>Adres İlçe</label>
        <input type="text" name="address_district" class="form-control" value="{{ old('address_district', $user->address_district) }}">
      </div>
      <div class="form-group">
        <label>Adres (Detay)</label>
        <textarea name="address_line" class="form-control">{{ old('address_line', $user->address_line) }}</textarea>
      </div>

      <button class="btn btn-primary" type="submit">Kaydet</button>
      <a href="{{ url('/profile') }}" class="btn btn-secondary">İptal</a>
    </form>
  </div>
</div>
@endsection
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
