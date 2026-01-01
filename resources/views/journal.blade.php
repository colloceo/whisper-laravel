@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 style="color: var(--whisper-blue); font-weight: 700;">AI Journal</h2>
                <p class="text-muted">Safe space for cognitive reframing.</p>
            </div>
        </div>

        <livewire:journal-entry />
    </div>
@endsection