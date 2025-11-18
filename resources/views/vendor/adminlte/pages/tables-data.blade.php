@extends('vendor.adminlte.layouts.admin')

@section('content')
<div class="container-fluid">
  <h4>Tablolar — DataTables</h4>
  <table id="datatable" class="table table-striped table-bordered">
    <thead><tr><th>İsim</th><th>E-posta</th></tr></thead>
    <tbody><tr><td>Örnek</td><td>ornek@ornek.com</td></tr></tbody>
  </table>
</div>
@endsection

  @push('scripts')
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        if (window.jQuery && $.fn.dataTable) {
          $('#datatable').DataTable({responsive:true});
        }
      });
    </script>
  @endpush
