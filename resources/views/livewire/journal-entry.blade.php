<div class="row">
    <div class="col-md-7 mb-4">
        <!-- Journal Input Card -->
        <div class="glass-card border-0 p-4 mb-4">
            <h5 class="fw-bold mb-3 brand-text">What's on your mind?</h5>
            <p class="text-muted small mb-4">Share your thoughts freely. Our AI will help transform them into positive
                insights.</p>

            <form wire:submit.prevent="submitEntry">
                <div class="mb-3">
                    <textarea wire:model="content" class="form-control border-0 shadow-sm p-3"
                        placeholder="Today I feel... I'm thinking about... What's been on my mind is..." rows="6"
                        style="background: rgba(255, 255, 255, 0.6); resize: none; border-radius: 1rem; font-size: 0.95rem;"></textarea>
                    @error('content') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="small text-muted mb-2 text-uppercase fw-bold" style="letter-spacing: 0.5px;">Quick
                        prompts:</label>
                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" wire:click="setPrompt('I\'m feeling overwhelmed because')"
                            class="btn btn-sm rounded-pill bg-white border-0 shadow-sm text-secondary small px-3">I'm
                            feeling overwhelmed...</button>
                        <button type="button" wire:click="setPrompt('I achieved something good today:')"
                            class="btn btn-sm rounded-pill bg-white border-0 shadow-sm text-secondary small px-3">I
                            achieved...</button>
                        <button type="button" wire:click="setPrompt('I want to let go of')"
                            class="btn btn-sm rounded-pill bg-white border-0 shadow-sm text-secondary small px-3">I want
                            to let go of...</button>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm"
                        style="background: linear-gradient(135deg, #a8dadc 0%, #457b9d 100%); border: none;"
                        wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="submitEntry">Save & Reframe Thought</span>
                        <div wire:loading.flex wire:target="submitEntry"
                            class="align-items-center justify-content-center">
                            <div class="spinner-border spinner-border-sm me-2 text-white" role="status"></div>
                            <span>Reframing...</span>
                        </div>
                    </button>
                </div>
            </form>
        </div>

        <!-- AI Insight Card (Conditional) -->
        @if($aiResponse)
            <div class="ai-insight-card p-4 mb-4 shadow-sm">
                <div class="d-flex align-items-center mb-3">
                    <div
                        class="insight-icon-wrapper p-2 shadow-sm me-3 text-primary d-flex align-items-center justify-content-center">
                        <i class="bi bi-stars"></i>
                    </div>
                    <h6 class="fw-bold mb-0 text-primary">Whispr's Insight</h6>
                </div>
                <p class="mb-0 brand-text" style="line-height: 1.6;">
                    {{ $aiResponse }}
                </p>
            </div>
        @endif
    </div>

    <!-- Right Column: Recent Entries -->
    <div class="col-md-5">
        <h6 class="fw-bold text-muted small text-uppercase mb-3 px-1">Recent Reflections</h6>

        <div class="d-flex flex-column gap-3">
            @forelse($entries as $entry)
                <div class="glass-card border-0 p-3 hover-scale transition-all position-relative overflow-hidden mb-3">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <small class="fw-bold brand-text">{{ $entry->created_at->format('M d, Y') }}</small>
                            <small class="text-muted d-block"
                                style="font-size: 0.75rem;">{{ $entry->created_at->format('H:i') }}</small>
                        </div>
                        <button wire:click="deleteEntry({{ $entry->id }})"
                            wire:confirm="Are you sure you want to delete this reflection?"
                            class="btn btn-link text-danger p-0 border-0" style="font-size: 0.8rem; text-decoration: none;">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </div>

                    <div class="mb-3 position-relative">
                        <i class="bi bi-quote position-absolute top-0 start-0 text-muted opacity-25 display-6"
                            style="transform: translate(-5px, -10px);"></i>
                        <p class="mb-0 brand-text small fst-italic ps-3 position-relative" style="z-index: 1;">
                            "{{ $entry->content }}"
                        </p>
                    </div>

                    @if($entry->ai_response)
                        <div class="reframe-card rounded-3 p-3 shadow-sm border-0">
                            <div class="d-flex align-items-center mb-2">
                                <div class="insight-icon-wrapper me-2 d-flex align-items-center justify-content-center"
                                    style="width: 24px; height: 24px;">
                                    <i class="bi bi-stars text-primary" style="font-size: 0.7rem;"></i>
                                </div>
                                <span class="text-primary fw-bold"
                                    style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.5px;">Reframed</span>
                            </div>
                            <p class="mb-0 small brand-text" style="line-height: 1.5;">
                                {{ $entry->ai_response }}
                            </p>
                        </div>
                    @endif
                </div>
            @empty
                <div class="text-center py-5 opacity-50">
                    <i class="bi bi-journal-album display-4 mb-3 d-block text-secondary"></i>
                    <p class="small text-muted">No entries yet. Start writing today...</p>
                </div>
            @endforelse
        </div>
    </div>

    <style>
        .hover-scale:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .bg-soft-blue {
            background-color: #e0f2fe;
        }
    </style>
</div>