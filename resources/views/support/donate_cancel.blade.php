@extends('layouts.app')

@section('content')
    <div class="container py-5 text-center">
        <div class="glass-card p-5 d-inline-block">
            <i class="bi bi-x-circle-fill text-danger display-1 mb-3"></i>
            <h2 class="fw-bold mb-3">Donation Cancelled</h2>
            <p class="text-muted mb-4">No charges were made.</p>
            <a href="{{ route('profile') }}" class="btn btn-primary btn-pill px-4">Return to Profile</a>
        </div>
    </div>
@endsection