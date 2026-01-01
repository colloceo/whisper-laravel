@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="glass-card text-center p-5 animate__animated animate__fadeIn" style="max-width: 500px;">
            <div class="mb-4">
                <div class="rounded-circle d-inline-flex justify-content-center align-items-center mb-3"
                    style="width: 80px; height: 80px; background: rgba(245, 158, 11, 0.1);">
                    <i class="bi bi-shield-lock text-warning" style="font-size: 2.5rem;"></i>
                </div>
                <h1 class="fw-bold mb-2">403</h1>
                <h4 class="text-dark fw-bold mb-3">Restricted Area</h4>
                <p class="text-muted mb-4">
                    You don't have permission to access this page. Let's get you back to a safe place.
                </p>
                <a href="{{ route('home') }}" class="btn btn-primary btn-pill shadow-sm px-4 py-2">
                    <i class="bi bi-house-door me-2"></i>Return Home
                </a>
            </div>
        </div>
    </div>
@endsection