<div class="container py-4">
    <div class="row mb-4 text-center">
        <div class="col-md-12">
            <h3 class="fw-bold mb-1" style="color: #1e293b;">Peer Support</h3>
            <p class="text-muted small">Connect with others in a safe, anonymous environment.</p>
        </div>
    </div>

    <div class="row g-4">
        @forelse($rooms as $room)
            <div class="col-md-4">
                <a href="{{ route('chat.room', $room->id) }}" class="text-decoration-none">
                    <div class="card glass-card border-0 h-100 p-4 transition-all hover-lift">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm"
                                style="width: 50px; height: 50px; background: var(--whisper-blue); color: white;">
                                <i class="bi bi-{{ $room->icon ?? 'chat-dots' }} fs-4"></i>
                            </div>
                            <h5 class="fw-bold mb-0 text-dark">{{ $room->name }}</h5>
                        </div>
                        <p class="text-muted small mb-0">{{ $room->description }}</p>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="d-flex flex-column align-items-center justify-content-center opacity-50">
                    <i class="bi bi-chat-square-quote display-1 mb-3 text-secondary"></i>
                    <h5 class="fw-bold text-secondary">No active rooms</h5>
                    <p class="text-muted">Check back later for available support rooms.</p>
                </div>
            </div>
        @endforelse
    </div>

    <style>
        .hover-lift {
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</div>