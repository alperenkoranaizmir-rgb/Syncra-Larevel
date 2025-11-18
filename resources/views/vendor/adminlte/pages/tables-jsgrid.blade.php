@extends('vendor.adminlte.layouts.admin')

@section('content')
<div class="container-fluid">
  <h4>Tablolar — jsGrid</h4>
  <p>jsGrid örneği (static placeholder).</p>
</div>
@endsection

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      if (window.jsGrid) {
        $("#jsgrid").jsGrid({
          width: "100%",
          height: "400px",
          inserting: false,
          editing: false,
          sorting: true,
          paging: true,
          data: [{ Name: "Örnek", Email: "ornek@ornek.com" }]
        });
      }
    });
  </script>
@endpush
