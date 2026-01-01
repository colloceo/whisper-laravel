@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="glass-card text-center p-5 animate__animated animate__fadeIn" style="max-width: 500px;">
            <div class="mb-4">
                <div class="rounded-circle d-inline-flex justify-content-center align-items-center mb-3"
                    style="width: 80px; height: 80px; background: rgba(239, 68, 68, 0.1);">
                    <i class="bi bi-server text-danger" style="font-size: 2.5rem;"></i>
                </div>
                <h1 class="fw-bold mb-2">500</h1>
                <h4 class="text-dark fw-bold mb-3">Something went wrong</h4>
                <p class="text-muted mb-4">
                    We're experiencing a slight technical hiccup. Our team has been notified and is working on fixing it.
                </p>
                <div class="d-flex justify-content-center gap-2">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-pill px-4">
                        Back
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-primary btn-pill shadow-sm px-4">
                        <i class="bi bi-house-door me-2"></i>Return Home
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection