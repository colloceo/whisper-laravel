<div class="row">
    <div class="col-md-7 mb-4">
        <!-- Journal Input Card -->
        <div class="card glass-card border-0 p-4 mb-4">
            <h5 class="fw-bold mb-3 text-dark">What's on your mind?</h5>
            <p class="text-muted small mb-4">Share your thoughts freely. Our AI will help transform them into positive
                insights.</p>

            <form wire:submit.prevent="submitEntry">
                <div class="mb-3">
                    <textarea wire:model="content" class="form-control border-0 shadow-sm p-3"
                        placeholder="Today I feel... I'm thinking about... What's been on my mind is..." rows="6"
                        style="background: #f8fafc; resize: none; border-radius: 1rem;"></textarea>
                    @error('content') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="small text-muted mb-2">Quick prompts:</label>
                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" wire:click="setPrompt('I\'m feeling overwhelmed because')"
                            class="btn btn-outline-secondary btn-sm rounded-pill">I'm feeling overwhelmed...</button>
                        <button type="button" wire:click="setPrompt('I achieved something good today:')"
                            class="btn btn-outline-secondary btn-sm rounded-pill">I achieved...</button>
                        <button type="button" wire:click="setPrompt('I want to let go of')"
                            class="btn btn-outline-secondary btn-sm rounded-pill">I want to let go of...</button>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm"
                        style="background: var(--whisper-blue); border: none;" wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="submitEntry">Save & Reframe Thought</span>
                        <div wire:loading wire:target="submitEntry"
                            class="d-flex align-items-center justify-content-center">
                            <div class="spinner-border spinner-border-sm me-2 text-white" role="status"></div>
                            <span>Reframing...</span>
                        </div>
                    </button>
                </div>
            </form>
        </div>

        <!-- AI Insight Card (Conditional) -->
        @if($aiResponse)
            <div class="card border-0 p-4 mb-4 shadow-sm"
                style="background: linear-gradient(135deg, #e0f2fe 0%, #ffffff 100%); border-radius: 1.5rem; border-left: 5px solid var(--whisper-blue);">
                <div class="d-flex align-items-center mb-3">
                    <div class="rounded-circle bg-white p-2 shadow-sm me-3 text-primary d-flex align-items-center justify-content-center"
                        style="width: 40px; height: 40px;">
                        <i class="bi bi-stars"></i>
                    </div>
                    <h6 class="fw-bold mb-0 text-primary">Whispr's Insight</h6>
                </div>
                <p class="mb-0" style="color: #334155; line-height: 1.6;">
                    {{ $aiResponse }}
                </p>
            </div>
        @endif
    </div>

    <!-- Right Column: Recent Entries -->
    <div class="col-md-5">
        <h5 class="fw-bold mb-3 text-dark px-2">Recent Reflections</h5>

        <div class="d-flex flex-column gap-3">
            @forelse($entries as $entry)
                <div class="card glass-card border-0 p-3 hover-scale transition-all">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <small class="text-muted fw-bold">{{ $entry->created_at->format('M d, Y') }}</small>
                        <small class="text-muted">{{ $entry->created_at->format('H:i') }}</small>
                    </div>
                    <p class="mb-2 text-truncate text-dark" style="font-style: italic;">
                        "{{ Str::limit($entry->content, 60) }}"</p>

                    @if($entry->ai_response)
                        <div class="bg-primary bg-opacity-10 p-2 rounded-3 mt-2">
                            <div class="d-flex align-items-center mb-1">
                                <i class="bi bi-stars text-primary me-2" style="font-size: 0.8rem;"></i>
                                <span class="text-primary fw-bold" style="font-size: 0.75rem;">Reframed</span>
                            </div>
                            <p class="mb-0 small text-dark">{{ Str::limit($entry->ai_response, 80) }}</p>
                        </div>
                    @endif
                </div>
            @empty
                <div class="text-center py-5 opacity-50">
                    <i class="bi bi-journal-album display-4 mb-3 d-block text-secondary"></i>
                    <p>No entries yet. Start writing today...</p>
                </div>
            @endforelse
        </div>
    </div>

    <style>
        .hover-scale:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
    </style>
</div>