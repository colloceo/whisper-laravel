@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="row g-4 mb-4">
        <!-- Stat Card 1 -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 bg-primary bg-opacity-10 p-3 rounded">
                            <i class="bi bi-people fs-3 text-primary"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-0">Total Users</h6>
                            <h3 class="fw-bold mb-0">{{ number_format($stats['total_users']) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stat Card 2 -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 bg-success bg-opacity-10 p-3 rounded">
                            <i class="bi bi-activity fs-3 text-success"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-0">Active Today</h6>
                            <h3 class="fw-bold mb-0">{{ number_format($stats['active_today']) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stat Card 3 -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 bg-info bg-opacity-10 p-3 rounded">
                            <i class="bi bi-graph-up fs-3 text-info"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-0">Total Mood Logs</h6>
                            <h3 class="fw-bold mb-0">{{ number_format($stats['total_mood_logs']) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stat Card 4 -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 bg-warning bg-opacity-10 p-3 rounded">
                            <i class="bi bi-journal-text fs-3 text-warning"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-0">Journal Entries</h6>
                            <h3 class="fw-bold mb-0">{{ number_format($stats['total_journal_entries']) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection