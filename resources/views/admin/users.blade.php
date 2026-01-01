@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">User Management</h1>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Joined</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <img src="https://ui-avatars.com/api/?name={{ $user->name }}&background=random" alt=""
                                            width="32" height="32" class="rounded-circle me-2">
                                        <strong>{{ $user->name }}</strong>
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->is_admin)
                                        <span class="badge bg-primary">Admin</span>
                                    @else
                                        <span class="badge bg-secondary">User</span>
                                    @endif
                                </td>
                                <td>{{ $user->created_at->format('M d, Y') }}</td>
                                <td class="text-end pe-4">
                                    @if($user->id !== auth()->id())
                                        <div class="btn-group">
                                            <form action="{{ route('admin.users.toggle', $user->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @if($user->is_admin)
                                                    <button type="submit" class="btn btn-sm btn-outline-warning"
                                                        onclick="return confirm('Demote this user?')">Demote</button>
                                                @else
                                                    <button type="submit" class="btn btn-sm btn-outline-primary"
                                                        onclick="return confirm('Promote this user to Admin?')">Promote</button>
                                                @endif
                                            </form>

                                            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Deleting this user will remove all their data permanently. Continue?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <span class="text-muted small">Current User</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white border-0 py-3">
            {{ $users->links() }}
        </div>
    </div>
@endsection