@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Chat Rooms</h1>
    </div>

    <div class="row">
        <!-- List Rooms -->
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4">Room Name</th>
                                    <th>Description</th>
                                    <th>Messages</th>
                                    <th>Status</th>
                                    <th class="text-end pe-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rooms as $room)
                                    <tr>
                                        <td class="ps-4 fw-bold">
                                            @if($room->icon) <i class="{{ $room->icon }} me-2"></i> @endif
                                            {{ $room->name }}
                                        </td>
                                        <td class="text-muted small">{{ Str::limit($room->description, 50) }}</td>
                                        <td>{{ $room->messages_count }}</td>
                                        <td>
                                            @if($room->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="text-end pe-4">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.chat_rooms.edit', $room->id) }}"
                                                    class="btn btn-sm btn-outline-secondary">
                                                    Edit
                                                </a>
                                                <form action="{{ route('admin.chat_rooms.delete', $room->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Are you sure you want to delete this room? This action cannot be undone.')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Create New Room -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-bold">Create New Room</div>
                <div class="card-body">
                    <form action="{{ route('admin.chat_rooms.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Room Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon Class (Bootstrap Icons)</label>
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="bi bi-chat">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Create Room</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection