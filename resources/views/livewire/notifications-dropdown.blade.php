<div class="dropdown" wire:poll.5s>
    <button class="btn btn-link text-dark p-1 border-0 shadow-none position-relative" type="button"
        data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-bell-fill fs-5 text-muted"></i>
        @if($unreadCount > 0)
            <span
                class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"
                style="width: 10px; height: 10px; margin-top: 5px; margin-left: -5px;">
                <span class="visually-hidden">New alerts</span>
            </span>
        @endif
    </button>
    <div class="dropdown-menu dropdown-menu-end glass-card border-0 shadow-lg p-0 mt-2"
        style="width: 300px; max-height: 400px; overflow-y: auto; z-index: 4000;">
        <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
            <h6 class="mb-0 fw-bold">Notifications</h6>
            @if($unreadCount > 0)
                <button wire:click="markAllAsRead" class="btn btn-link p-0 text-primary small text-decoration-none"
                    style="font-size: 0.75rem;">
                    Mark all as read
                </button>
            @endif
        </div>
        <div class="list-group list-group-flush">
            @forelse($notifications as $notification)
                <div class="list-group-item list-group-item-action border-0 p-3 {{ $notification->read_at ? 'opacity-75' : 'bg-light-blue' }}"
                    style="{{ !$notification->read_at ? 'background-color: rgba(168, 218, 220, 0.1);' : '' }}">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="mb-1 small {{ !$notification->read_at ? 'fw-bold' : '' }}">
                                {{ $notification->data['message'] ?? 'New notification' }}
                            </p>
                            <small class="text-muted" style="font-size: 0.7rem;">
                                {{ $notification->created_at->diffForHumans() }}
                            </small>
                        </div>
                        @if(!$notification->read_at)
                            <button wire:click="markAsRead('{{ $notification->id }}')" class="btn btn-link p-0 text-muted"
                                title="Mark as read">
                                <i class="bi bi-check2-all"></i>
                            </button>
                        @endif
                    </div>
                </div>
            @empty
                <div class="p-4 text-center text-muted">
                    <i class="bi bi-bell-slash fs-4 mb-2 d-block"></i>
                    <p class="small mb-0">No notifications yet</p>
                </div>
            @endforelse
        </div>
        @if($notifications->count() > 0)
            <div class="p-2 text-center border-top">
                <a href="{{ route('notifications') }}" class="text-primary small text-decoration-none fw-bold"
                    style="font-size: 0.75rem;">View all
                    alerts</a>
            </div>
        @endif
    </div>
</div>