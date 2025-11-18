@extends('vendor.adminlte.layouts.admin')

@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Takvim</h4>
    <div>
      <button id="create-event-btn" class="btn btn-primary">Yeni Etkinlik</button>
    </div>
  </div>

  <div id="calendar" data-events-url="{{ route('admin.calendar.events') }}"></div>

  <!-- Event Modal -->
  <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Etkinlik</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Kapat">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="event-form">
          <div class="modal-body">
            <input type="hidden" name="id" id="event-id">
            <div class="form-group">
              <label for="event-title">Başlık</label>
              <input type="text" class="form-control" id="event-title" name="title" required>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="event-start">Başlangıç</label>
                <input type="datetime-local" class="form-control" id="event-start" name="start" required>
              </div>
              <div class="form-group col-md-6">
                <label for="event-end">Bitiş</label>
                <input type="datetime-local" class="form-control" id="event-end" name="end">
              </div>
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="event-all-day" name="all_day">
              <label class="form-check-label" for="event-all-day">Tüm gün</label>
            </div>
            <div class="form-group">
              <label for="event-description">Açıklama</label>
              <textarea id="event-description" name="description" class="form-control"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="delete-event-btn">Sil</button>
            <button type="submit" class="btn btn-primary">Kaydet</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@push('scripts')
  @vite('resources/js/pages/calendar.js')
@endpush

@endsection
