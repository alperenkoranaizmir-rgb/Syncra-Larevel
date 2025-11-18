@extends('vendor.adminlte.layouts.admin')

@section('content')
<div class="container-fluid">
  <h4>Takvim</h4>
  <div id="calendar"></div>
</div>

@push('scripts')
  <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/main.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/main.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/main.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/main.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'dayGrid' ],
        initialView: 'dayGridMonth',
        events: '{{ route('admin.calendar.events') }}'
      });
      calendar.render();
    });
  </script>
@endpush

@endsection
