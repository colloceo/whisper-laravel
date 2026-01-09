<div>
    @section('page_title', 'Notifications')

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Header Actions -->
                <div class="d-flex justify-content-between align-items-center mb-4 ps-1">
                    <h5 class="fw-bold text-dark mb-0">Your Activity Alerts</h5>
                    <div class="dropdown">
                        <button class="btn btn-soft-light btn-sm rounded-pill px-3 dropdown-toggle border-0 shadow-sm" type="button" data-bs-toggle="dropdown">
                            Manage
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end glass-card border-0 shadow-lg p-2">
                            <li>
                                <button wire:click="markAllAsRead" class="dropdown-item rounded-3 py-2 small">
                                    <i class="bi bi-check2-all me-2"></i> Mark all read
                                </button>
                            </li>
                            <li>
                                <button wire:click="clearAll" class="dropdown-item rounded-3 py-2 small text-danger" 
                                        onclick="return confirm('Clear all notifications permanentally?')">
                                    <i class="bi bi-trash3 me-2"></i> Clear history
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Notifications List -->
                <div class="glass-card border-0 overflow-hidden" style="border-radius: 1.5rem;">
                    <div class="list-group list-group-flush bg-transparent">
                        @forelse($notifications as $notification)
                            <div class="list-group-item list-group-item-action bg-transparent border-light p-4 transition-all {{ $notification->read_at ? 'opacity-75' : 'bg-highlight' }}"
                                 style="{{ !$notification->read_at ? 'background-color: rgba(168, 218, 220, 0.05);' : '' }}">
                                <div class="d-flex align-items-start gap-3">
                                    <!-- Icon based on type -->
                                    <div class="flex-shrink-0">
                                        @if(($notification->data['type'] ?? '') === 'daily_reminder')
                                            <div class="p-3 bg-info bg-opacity-10 text-info rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                                <i class="bi bi-journal-check fs-4"></i>
                                            </div>
                                        @elseif(isset($notification->data['message_id']))
                                            <div class="p-3 bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                                <i class="bi bi-chat-left-dots fs-4"></i>
                                            </div>
                                        @else
                                            <div class="p-3 bg-secondary bg-opacity-10 text-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                                <i class="bi bi-bell fs-4"></i>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Content -->
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h6 class="mb-1 fw-bold text-dark">
                                                    {{ $notification->data['message'] ?? 'New Notification' }}
                                                </h6>
                                                @if(isset($notification->data['content']))
                                                    <p class="text-muted small mb-2 fst-italic">
                                                        "{{ Str::limit($notification->data['content'], 100) }}"
                                                    </p>
                                                @endif
                                                <div class="d-flex align-items-center gap-3">
                                                    <small class="text-muted opacity-75">
                                                        <i class="bi bi-clock me-1"></i> {{ $notification->created_at->diffForHumans() }}
                                                    </small>
                                                    @if(isset($notification->data['action_url']) || isset($notification->data['room_id']))
                                                        @php 
                                                            $url = $notification->data['action_url'] ?? route('chat.room', $notification->data['room_id']);
                                                        @endphp
                                                        <a href="{{ $url }}" wire:click="markAsRead('{{ $notification->id }}')" class="small fw-bold text-primary text-decoration-none">
                                                            View Details <i class="bi bi-arrow-right ms-1"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="d-flex gap-2">
                                                @if(!$notification->read_at)
                                                    <button wire:click="markAsRead('{{ $notification->id }}')" class="btn btn-link p-0 text-muted shadow-none" title="Mark as read">
                                                        <i class="bi bi-check-lg fs-5"></i>
                                                    </button>
                                                @endif
                                                <button wire:click="delete('{{ $notification->id }}')" class="btn btn-link p-0 text-muted hover-danger shadow-none" title="Delete">
                                                    <i class="bi bi-x-lg fs-6"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="p-5 text-center my-4">
                                <div class="mb-4">
                                    <i class="bi bi-bell-slash text-muted opacity-25" style="font-size: 5rem;"></i>
                                </div>
                                <h5 class="fw-bold text-dark">All Caught Up!</h5>
                                <p class="text-muted">You have no notifications at the moment.</p>
                                <a href="{{ route('dashboard') }}" class="btn btn-primary rounded-pill px-4 mt-2">
                                    Return to Home
                                </a>
                            </div>
                        @endforelse
                    </div>

                    @if($notifications->hasPages())
                        <div class="p-4 border-top bg-light bg-opacity-25">
                            {{ $notifications->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        .hover-danger:hover {
            color: #dc3545 !important;
        }
        .transition-all {
            transition: all 0.2s ease;
        }
        .bg-light-blue {
            background-color: rgba(168, 218, 220, 0.05);
        }
    </style>
</div>
