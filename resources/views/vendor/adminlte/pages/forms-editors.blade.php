@extends('vendor.adminlte.layouts.admin')

@section('content')
<div class="container-fluid">
  <h4>Formlar — Editörler</h4>
  <p>Rich text editor örnekleri (Summernote).</p>
  <div class="form-group">
    <label>İçerik</label>
    <textarea class="form-control summernote" name="content"></textarea>
  </div>
</div>
@endsection

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      if (window.jQuery && $.fn.summernote) {
        $('.summernote').summernote({height:200});
      }
    });
  </script>
@endpush
