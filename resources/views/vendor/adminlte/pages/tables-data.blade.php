@extends('vendor.adminlte.layouts.admin')

@section('content')
<div class="container-fluid">
  <h4>Tablolar — DataTables</h4>
  <table id="datatable" class="table table-striped table-bordered">
    <thead><tr><th>#</th><th>İsim</th><th>E-posta</th></tr></thead>
    <tbody>
      <tr><td>1</td><td>Ali Veli</td><td>ali@example.com</td></tr>
      <tr><td>2</td><td>Ayşe Yılmaz</td><td>ayse@example.com</td></tr>
      <tr><td>3</td><td>Deneme Kullanıcı</td><td>deneme@example.com</td></tr>
    </tbody>
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
