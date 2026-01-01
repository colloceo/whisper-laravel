<div>
    <div class="d-flex flex-column chat-container" style="height: 100vh; overflow: hidden;">

        <!-- Zone A: Sticky Header -->
        <div class="glass-header d-flex align-items-center justify-content-between px-4 py-3 sticky-top z-10 chat-header"
            style="border-bottom-width: 1px; border-bottom-style: solid;">
            <div class="d-flex align-items-center">
                <a href="{{ route('chat') }}" class="btn btn-sm btn-light rounded-circle me-3 shadow-sm d-md-none"
                    style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <a href="{{ route('chat') }}"
                    class="btn btn-sm btn-light rounded-circle me-3 shadow-sm d-none d-md-flex"
                    style="width: 32px; height: 32px; align-items: center; justify-content: center;">
                    <i class="bi bi-arrow-left"></i>
                </a>

                <div>
                    <h5 class="fw-bold mb-0 text-dark">{{ $room->name }}</h5>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-success rounded-pill me-1"
                            style="width: 8px; height: 8px; padding: 0;"></span>
                        <small class="text-muted fw-bold" style="font-size: 0.75rem;">Live</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Zone B: Message Stream -->
        <div class="flex-grow-1 overflow-auto p-4" id="chatStream" wire:poll.2s>
            @foreach($messages as $message)
                <div
                    class="d-flex flex-column mb-3 {{ $message->user_id === auth()->id() ? 'align-items-end' : 'align-items-start' }}">

                    @if($message->user_id !== auth()->id())
                        <small class="text-muted ms-2 mb-1 fw-bold" style="font-size: 0.7rem;">
                            {{ $message->user->name }}
                        </small>
                    @endif

                    <div class="position-relative group-hover-actions">
                        <!-- Reply Context -->
                        @if($message->parent)
                            <div class="small text-muted mb-1 ms-2 ps-2 border-start border-3" style="font-size: 0.75rem;">
                                <i class="bi bi-arrow-return-right me-1"></i>
                                <strong>{{ $message->parent->user->name }}:</strong>
                                {{ Str::limit($message->parent->content, 30) }}
                            </div>
                        @endif

                        <!-- Message Bubble -->
                        <div class="p-3 shadow-sm text-break position-relative {{ $message->user_id !== auth()->id() ? 'chat-received' : '' }}"
                            style="max-width: 75vw; width: fit-content;
                                                border-radius: {{ $message->user_id === auth()->id() ? '15px 15px 0 15px' : '15px 15px 15px 0' }};
                                                background: {{ $message->user_id === auth()->id() ? 'var(--whisper-blue, #3b82f6)' : '' }};
                                                color: {{ $message->user_id === auth()->id() ? '#fff' : '' }};
                                                backdrop-filter: blur(5px);">
                            {{ $message->content }}
                        </div>

                        <!-- Action Buttons -->
                        <div
                            class="mt-1 d-flex gap-2 {{ $message->user_id === auth()->id() ? 'justify-content-end me-1' : 'ms-1' }}">
                            <small class="text-muted" style="font-size: 0.65rem;">
                                {{ $message->created_at->format('H:i') }}
                            </small>

                            <button wire:click="replyTo({{ $message->id }})" class="btn btn-link p-0 text-muted"
                                style="font-size: 0.7rem; text-decoration: none;">
                                <i class="bi bi-reply-fill"></i> Reply
                            </button>

                            @if($message->user_id !== auth()->id())
                                <button wire:click="promptReport({{ $message->id }})" class="btn btn-link p-0 text-muted"
                                    style="font-size: 0.7rem; text-decoration: none;">
                                    <i class="bi bi-flag-fill"></i> Report
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Zone C: Input Area -->
        <div class="glass-footer p-3 sticky-bottom chat-footer" style="border-top-width: 1px; border-top-style: solid;">
            @if($replyingTo)
                <div class="d-flex align-items-center justify-content-between bg-light p-2 mb-2 rounded shadow-sm">
                    <div class="small text-muted">
                        <i class="bi bi-reply-fill me-1"></i> Replying to <strong>{{ $replyingTo->user->name }}</strong>: 
                        "{{ Str::limit($replyingTo->content, 40) }}"
                    </div>
                    <button wire:click="cancelReply" class="btn-close btn-close-sm"></button>
                </div>
            @endif

            <form wire:submit.prevent="sendMessage">
                <div class="d-flex align-items-center">
                    <input type="text" wire:model="newMessage" id="chatInput"
                        class="form-control form-control-lg border-0 shadow-sm ps-4 pe-5 me-2 chat-input"
                        placeholder="Type a message..." style="border-radius: 50px;">

                    <button type="submit"
                        class="btn btn-primary rounded-circle shadow-sm d-flex align-items-center justify-content-center flex-shrink-0"
                        style="width: 50px; height: 50px; border: none;">
                        <i class="bi bi-send-fill fs-5 text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Report Modal -->
    @if($showReportModal)
    <div class="modal fade show d-block" style="background: rgba(0,0,0,0.5);" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold">Report Message</h5>
                    <button type="button" class="btn-close" wire:click="closeReportModal"></button>
                </div>
                <div class="modal-body">
                    <textarea wire:model="reportReason" class="form-control mb-3" rows="3" placeholder="Why are you reporting this message? (e.g. Harassment, Spam)"></textarea>
                    
                    <div class="d-flex justify-content-end gap-2">
                        <button class="btn btn-light" wire:click="closeReportModal">Cancel</button>
                        <button class="btn btn-danger" wire:click="submitReport">Submit Report</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <script>
        document.addEventListener('livewire:initialized', () => {
             Livewire.on('focus-input', () => {
                document.getElementById('chatInput').focus();
            });
            
             // Existing scroll logic...
        });
    </script>


    <!-- Scroll Script -->
    <script>
        function scrollToBottom() {
            const stream = document.getElementById('chatStream');
            if (stream) {
                stream.scrollTop = stream.scrollHeight;
            }
        }

        document.addEventListener('livewire:initialized', () => {
            scrollToBottom();

            Livewire.on('scroll-to-bottom', () => {
                setTimeout(scrollToBottom, 50);
            });

            Livewire.hook('morph.updated', () => {
                scrollToBottom();
            });
        });
    </script>
</div>