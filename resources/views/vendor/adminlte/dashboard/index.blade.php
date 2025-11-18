@extends('vendor.adminlte.layouts.admin')

@section('content')
<div class="container-fluid">
    <h2 class="mb-3">Admin Dashboard</h2>
    @include('vendor.adminlte.dashboard.cards')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p>Dashboard content goes here — charts, stats, recent activity.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
