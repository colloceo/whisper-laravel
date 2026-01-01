@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Resource</h1>
        <a href="{{ route('admin.resources') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back to Resources
        </a>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.resources.update', $resource->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $resource->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select class="form-select" id="type" name="type" required>
                                <option value="hotline" {{ $resource->type == 'hotline' ? 'selected' : '' }}>Hotline (Phone)
                                </option>
                                <option value="website" {{ $resource->type == 'website' ? 'selected' : '' }}>Website (Link)
                                </option>
                                <option value="organization" {{ $resource->type == 'organization' ? 'selected' : '' }}>
                                    Organization (Both/Other)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone (Optional)</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ old('phone', $resource->phone) }}">
                        </div>

                        <div class="mb-3">
                            <label for="url" class="form-label">URL (Optional)</label>
                            <input type="url" class="form-control" id="url" name="url"
                                value="{{ old('url', $resource->url) }}" placeholder="https://...">
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update Resource</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection