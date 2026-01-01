@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Message Reports</h1>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">Reporter</th>
                            <th>Reported User</th>
                            <th>Message Content</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Time</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                            <tr>
                                <td class="ps-4">
                                    <span class="fw-bold">{{ $report->reporter->name }}</span>
                                </td>
                                <td>
                                    @if($report->message && $report->message->user)
                                        {{ $report->message->user->name }}
                                    @else
                                        <span class="text-muted fst-italic">User Deleted</span>
                                    @endif
                                </td>
                                <td>
                                    @if($report->message)
                                        <div class="text-wrap" style="max-width: 300px;">
                                            "{{ Str::limit($report->message->content, 100) }}"
                                        </div>
                                    @else
                                        <span class="text-muted fst-italic">Message Deleted</span>
                                    @endif
                                </td>
                                <td><span class="text-danger">{{ $report->reason }}</span></td>
                                <td>
                                    @if($report->status === 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif($report->status === 'resolved')
                                        <span class="badge bg-success">Resolved</span>
                                    @else
                                        <span class="badge bg-secondary">Dismissed</span>
                                    @endif
                                </td>
                                <td>{{ $report->created_at->diffForHumans() }}</td>
                                <td class="text-end pe-4">
                                    @if($report->status === 'pending')
                                        <form action="{{ route('admin.reports.dismiss', $report->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-outline-secondary" title="Dismiss Report">
                                                Dismiss
                                            </button>
                                        </form>

                                        <form action="{{ route('admin.reports.delete_message', $report->id) }}" method="POST"
                                            class="d-inline ms-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete Message"
                                                onclick="return confirm('Delete this message? This resolves the report.')">
                                                Delete Message
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-muted small">-</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white border-0 py-3">
            {{ $reports->links() }}
        </div>
    </div>
@endsection