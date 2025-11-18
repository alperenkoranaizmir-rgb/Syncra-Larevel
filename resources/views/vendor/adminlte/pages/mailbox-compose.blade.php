@extends('vendor.adminlte.layouts.admin')

@section('content')
<div class="container-fluid">
  <h4>Compose</h4>
  <form>
    <div class="form-group"><input class="form-control" placeholder="Kime"></div>
    <div class="form-group"><input class="form-control" placeholder="Konu"></div>
    <div class="form-group"><textarea class="form-control" rows="6"></textarea></div>
    <button class="btn btn-primary">Gönder</button>
  </form>
</div>
@endsection
