@extends('vendor.adminlte.layouts.admin')

@section('content')
<div class="container-fluid">
  <h4>UI — Zaman Çizelgesi</h4>
  <div class="timeline">
    <div class="time-label"><span class="bg-red">Bugün</span></div>
    <div>
      <i class="fas fa-envelope bg-blue"></i>
      <div class="timeline-item">
        <h3 class="timeline-header">Yeni mesaj</h3>
        <div class="timeline-body">Mesaj içeriği örneği.</div>
      </div>
    </div>
  </div>
</div>
@endsection
