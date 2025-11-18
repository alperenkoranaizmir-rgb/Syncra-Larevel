@extends('vendor.adminlte.layouts.admin')

@section('content')
<div class="container-fluid">
  <h4>Formlar — Editörler</h4>
  <p>Rich text editor örnekleri (Summernote/Quill).</p>
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
