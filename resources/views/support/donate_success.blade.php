@extends('layouts.app')

@section('content')
    <div class="container py-5 text-center">
        <div class="glass-card p-5 d-inline-block">
            <i class="bi bi-check-circle-fill text-success display-1 mb-3"></i>
            <h2 class="fw-bold mb-3">Thank You!</h2>
            <p class="text-muted mb-4">Your donation helps us keep Whispr running.</p>
            <a href="{{ route('home') }}" class="btn btn-primary btn-pill px-4">Return Home</a>
        </div>
    </div>
@endsection