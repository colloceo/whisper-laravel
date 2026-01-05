@extends('layouts.app')
@section('page_title', 'Journal')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="text-center mb-4 px-2">
                    <div>
                        <h5 class="fw-bold text-dark mb-0">AI Journal</h5>
                        <small class="text-muted">Safe space for cognitive reframing.</small>
                    </div>
                </div>

                <livewire:journal-entry />
            </div>
        </div>
    </div>
@endsection