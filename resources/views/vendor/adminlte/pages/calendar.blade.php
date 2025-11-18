@extends('vendor.adminlte.layouts.admin')

@section('content')
<div class="container-fluid">
  <h4>Takvim</h4>
  <div id="calendar"></div>
</div>

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Use FullCalendar provided by the bundled app.js (Vite)
      var Calendar = window.FullCalendar.Calendar;
      var dayGrid = window.FullCalendar.dayGridPlugin;
      var calendarEl = document.getElementById('calendar');
      var calendar = new Calendar(calendarEl, {
        plugins: [ dayGrid ],
        initialView: 'dayGridMonth',
        events: '{{ route('admin.calendar.events') }}'
      });
      calendar.render();
    });
  </script>
@endpush

  {{-- FullCalendar CSS is vendored into `resources/css/vendor/fullcalendar.min.css` and bundled by Vite --}}

@endsection
