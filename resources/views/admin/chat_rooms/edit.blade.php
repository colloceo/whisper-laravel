@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Chat Room</h1>
        <a href="{{ route('admin.chat_rooms') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back to Rooms
        </a>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.chat_rooms.update', $room->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Room Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $room->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"
                                required>{{ old('description', $room->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon Class (Bootstrap Icons)</label>
                            <input type="text" class="form-control" id="icon" name="icon"
                                value="{{ old('icon', $room->icon) }}" placeholder="bi bi-chat">
                            <div class="form-text">Example: <code>bi bi-heart</code></div>
                        </div>

                        <div class="mb-3 form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active"
                                value="1" {{ $room->is_active ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active Status</label>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update Room</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection