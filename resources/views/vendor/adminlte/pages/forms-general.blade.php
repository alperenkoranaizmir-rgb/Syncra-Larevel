@extends('vendor.adminlte.layouts.admin')

@section('content')
<div class="container-fluid">
  <h4>Formlar — Genel</h4>
  <form>
    <div class="form-group">
      <label>Metin</label>
      <input class="form-control" />
    </div>
    <div class="form-group">
      <label>Seçim</label>
      <select class="form-control select2"><option>Sec</option></select>
    </div>
  </form>
</div>
@endsection

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      if (window.jQuery && $.fn.select2) {
        $('.select2').select2({width:'100%'});
      }
    });
  </script>
@endpush
