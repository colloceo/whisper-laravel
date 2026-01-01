@extends('layouts.app')

@section('content')
    <div class="container vh-100 d-flex align-items-center justify-content-center">
        <!-- Guidelines Modal (Static/Non-dismissible feel) -->
        <div class="card glass-card border-0 shadow-lg p-0"
            style="max-width: 500px; width: 100%; border-radius: 1.5rem; overflow: hidden;">

            <!-- Header -->
            <div class="p-4 text-center bg-white bg-opacity-50 border-bottom">
                <h3 class="fw-bold mb-0" style="color: #1e293b; font-family: 'Poppins', sans-serif;">Welcome to the Safe
                    Space</h3>
            </div>

            <div class="card-body p-4">

                <!-- Scrollable Terms Container -->
                <div id="termsContainer" class="mb-4 pe-2"
                    style="max-height: 300px; overflow-y: auto; scroll-behavior: smooth;">

                    <p class="text-muted small mb-4">Please review our community rules. You must read to the end to
                        continue.</p>

                    <div class="d-grid gap-3">
                        <div class="d-flex align-items-start p-3 rounded-3" style="background: rgba(255,255,255,0.6);">
                            <div class="me-3 fs-5 text-success"><i class="bi bi-check-circle-fill"></i></div>
                            <div>
                                <div class="fw-bold text-dark">Respect Privacy & Anonymity</div>
                                <small class="text-muted">What is shared here, stays here. Never ask for or share
                                    identifying details.</small>
                            </div>
                        </div>

                        <div class="d-flex align-items-start p-3 rounded-3" style="background: rgba(255,255,255,0.6);">
                            <div class="me-3 fs-5 text-success"><i class="bi bi-check-circle-fill"></i></div>
                            <div>
                                <div class="fw-bold text-dark">No Harmful or Illegal Content</div>
                                <small class="text-muted">We have zero tolerance for hate speech, violence, or promotion of
                                    self-harm.</small>
                            </div>
                        </div>

                        <div class="d-flex align-items-start p-3 rounded-3" style="background: rgba(255,255,255,0.6);">
                            <div class="me-3 fs-5 text-success"><i class="bi bi-check-circle-fill"></i></div>
                            <div>
                                <div class="fw-bold text-dark">No Bullying or Abuse</div>
                                <small class="text-muted">This is a sanctuary. Be kind, supportive, and empathetic at all
                                    times.</small>
                            </div>
                        </div>

                        <div class="d-flex align-items-start p-3 rounded-3" style="background: rgba(255,255,255,0.6);">
                            <div class="me-3 fs-5 text-success"><i class="bi bi-check-circle-fill"></i></div>
                            <div>
                                <div class="fw-bold text-dark">No Professional/Medical Advice</div>
                                <small class="text-muted">We are peers, not doctors. Always seek professional help for
                                    medical emergencies.</small>
                            </div>
                        </div>

                        <!-- Filler content to ensure scrolling is required on smaller screens if needed, 
                                     or just to force the user to "acknowledge" the bottom -->
                        <div class="text-muted small mt-3 fst-italic">
                            By clicking "I Commit", you acknowledge that violating these rules may result in account
                            suspension to protect the safety of our community.
                        </div>
                        <div style="height: 50px;"></div> <!-- Spacer to force scroll -->
                    </div>
                </div>

                <!-- Action -->
                <form method="POST" action="{{ route('onboarding.accept') }}">
                    @csrf
                    <button type="submit" id="commitBtn" class="btn btn-primary w-100 btn-pill py-3 fw-bold shadow-sm"
                        style="background: var(--whisper-blue); border: none; font-size: 1rem;" disabled>
                        I Commit to these Rules
                    </button>
                    <!-- Visual cue for disabled state -->
                    <div id="scrollHint" class="text-center mt-2 small text-primary fade show">
                        <i class="bi bi-arrow-down-short"></i> Scroll to bottom to accept
                    </div>
                </form>

            </div>
        </div>

        <!-- Background decoration -->
        <div class="position-absolute top-0 start-0 w-100 h-100"
            style="z-index: -1; background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.getElementById('termsContainer');
            const btn = document.getElementById('commitBtn');
            const hint = document.getElementById('scrollHint');

            container.addEventListener('scroll', function () {
                // Check if scrolled to bottom (with small buffer)
                if (container.scrollHeight - container.scrollTop <= container.clientHeight + 20) {
                    btn.removeAttribute('disabled');
                    btn.style.background = 'linear-gradient(90deg, #b2cbf2, #A8DADC)'; // Active visual
                    hint.classList.remove('show');
                    hint.style.display = 'none';
                }
            });
        });
    </script>
@endsection