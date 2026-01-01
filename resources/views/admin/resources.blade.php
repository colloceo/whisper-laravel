@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Crisis Resources</h1>
    </div>

    <div class="row">
        <!-- List Resources -->
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4">Name</th>
                                    <th>Type</th>
                                    <th>Details</th>
                                    <th class="text-end pe-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($resources as $resource)
                                    <tr>
                                        <td class="ps-4 fw-bold">{{ $resource->name }}</td>
                                        <td>
                                            @if($resource->type == 'hotline')
                                                <span class="badge bg-danger">Hotline</span>
                                            @elseif($resource->type == 'website')
                                                <span class="badge bg-info text-dark">Website</span>
                                            @else
                                                <span class="badge bg-warning text-dark">Organization</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($resource->phone)
                                                <div><i class="bi bi-telephone me-1"></i> {{ $resource->phone }}</div>
                                            @endif
                                            @if($resource->url)
                                                <div><i class="bi bi-link-45deg me-1"></i> <a href="{{ $resource->url }}"
                                                        target="_blank" class="text-decoration-none">Link</a></div>
                                            @endif
                                        </td>
                                        <td class="text-end pe-4">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.resources.edit', $resource->id) }}"
                                                    class="btn btn-sm btn-outline-secondary">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('admin.resources.delete', $resource->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Delete this resource?')">
                                                        <i class="bi bi-trash"></i>
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

        <!-- Add New Resource -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-bold">Add New Resource</div>
                <div class="card-body">
                    <form action="{{ route('admin.resources.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select class="form-select" id="type" name="type" required>
                                <option value="hotline">Hotline (Phone)</option>
                                <option value="website">Website (Link)</option>
                                <option value="organization">Organization (Both/Other)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone (Optional)</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="mb-3">
                            <label for="url" class="form-label">URL (Optional)</label>
                            <input type="url" class="form-control" id="url" name="url" placeholder="https://...">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Add Resource</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection