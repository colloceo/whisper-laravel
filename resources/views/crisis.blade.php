@extends('layouts.app')
@section('page_title', 'Crisis Support')

@section('content')
    <style>
        /* Warm Theme Overrides */
        .text-warm-dark {
            color: #7c2d12;
        }

        /* Dark reddish brown */
        .bg-warm-light {
            background-color: #fff7ed;
        }

        /* Very light orange */
        .border-warm {
            border-color: rgba(255, 99, 71, 0.3) !important;
        }

        .btn-call {
            background: #FFCDB2;
            color: #7c2d12;
            border: none;
            transition: transform 0.2s;
        }

        .btn-call:hover {
            background: #ffb499;
            color: #7c2d12;
            transform: translateY(-2px);
        }

        .btn-emergency {
            background: #ef4444;
            color: white;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.4);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(239, 68, 68, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(239, 68, 68, 0);
            }
        }

        /* Dark Mode Overrides for Modals */
        [data-theme="dark"] .modal-content {
            background-color: #1e293b !important;
            color: #f8fafc !important;
        }

        [data-theme="dark"] .modal-header .btn-close {
            filter: invert(1) grayscale(100%) brightness(200%);
        }

        [data-theme="dark"] .text-muted {
            color: #94a3b8 !important;
        }

        [data-theme="dark"] .text-dark {
            color: #f1f5f9 !important;
        }

        [data-theme="dark"] #groundingStepNum.text-dark {
            color: #1e293b !important;
            /* Keep step number dark on light circle */
        }
    </style>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="text-center mb-4 position-relative">
                    <h4 class="fw-bold mb-0 brand-text">Crisis Support</h4>
                    <p class="text-muted small mb-0">Help is always available</p>
                </div>

                <!-- Section A: Immediate Danger Hero -->
                <div class="card glass-card border-warm mb-4 shadow-sm" style="border-radius: 1.5rem; border-width: 2px;">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3 text-danger">
                            <i class="bi bi-shield-exclamation" style="font-size: 3rem;"></i>
                        </div>
                        <h2 class="h4 fw-bold text-danger mb-2">Help is always available.</h2>
                        <p class="text-muted small mb-4">
                            If you're in immediate danger, please contact emergency services immediately. Your safety is the
                            top priority.
                        </p>
                        <a href="tel:999" class="btn btn-emergency w-100 btn-pill py-3 fw-bold shadow-sm">
                            <i class="bi bi-telephone-fill me-2"></i> Call 999 (Emergency)
                        </a>
                    </div>
                </div>

                <!-- Section B: 24/7 Hotlines Grid -->
                <h6 class="fw-bold brand-text mb-3 ps-1">24/7 Crisis Hotlines - Kenya</h6>
                <div class="row g-3 mb-5">
                    <!-- Befrienders -->
                    <div class="col-12 col-md-6">
                        <div class="glass-card border-0 p-3 h-100 d-flex flex-column justify-content-between"
                            style="border-radius: 1.25rem;">
                            <div class="mb-3">
                                <h6 class="fw-bold brand-text mb-1">Befrienders Kenya</h6>
                                <small class="text-muted">Suicide prevention hotline</small>
                            </div>
                            <a href="tel:+254722178177" class="btn btn-call btn-sm w-100 rounded-pill fw-bold py-2">
                                <i class="bi bi-telephone-fill me-1"></i> Call
                            </a>
                        </div>
                    </div>

                    <!-- Child Helpline -->
                    <div class="col-12 col-md-6">
                        <div class="glass-card border-0 p-3 h-100 d-flex flex-column justify-content-between"
                            style="border-radius: 1.25rem;">
                            <div class="mb-3">
                                <h6 class="fw-bold brand-text mb-1">Child Helpline Kenya</h6>
                                <small class="text-muted">Support for children & teens</small>
                            </div>
                            <a href="tel:116" class="btn btn-call btn-sm w-100 rounded-pill fw-bold py-2">
                                <i class="bi bi-telephone-fill me-1"></i> Call
                            </a>
                        </div>
                    </div>

                    <!-- GVRC -->
                    <div class="col-12 col-md-6">
                        <div class="glass-card border-0 p-3 h-100 d-flex flex-column justify-content-between"
                            style="border-radius: 1.25rem;">
                            <div class="mb-3">
                                <h6 class="fw-bold brand-text mb-1">Gender Violence Recovery</h6>
                                <small class="text-muted">24/7 support for GBV survivors</small>
                            </div>
                            <a href="tel:1195" class="btn btn-call btn-sm w-100 rounded-pill fw-bold py-2">
                                <i class="bi bi-telephone-fill me-1"></i> Call
                            </a>
                        </div>
                    </div>

                    <!-- Emergency Fallback -->
                    <div class="col-12 col-md-6">
                        <div class="glass-card border-0 p-3 h-100 d-flex flex-column justify-content-between"
                            style="border-radius: 1.25rem;">
                            <div class="mb-3">
                                <h6 class="fw-bold text-danger mb-1">Emergency Services</h6>
                                <small class="text-muted">Police, Fire, Ambulance</small>
                            </div>
                            <a href="tel:999" class="btn btn-outline-danger btn-sm w-100 rounded-pill fw-bold py-2">
                                <i class="bi bi-telephone-fill me-1"></i> Call 999
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Section C: Immediate Coping Strategies -->
                <h6 class="fw-bold brand-text mb-3 ps-1">Calm Down Now</h6>
                <div class="row g-3 mb-5">
                    <!-- Guided Breathing -->
                    <div class="col-12">
                        <div class="glass-card border-0 p-3 d-flex align-items-center justify-content-between transition-hover"
                            style="border-radius: 1.25rem; cursor: pointer;" onclick="openBreathingModal()">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-info bg-opacity-10 p-3 me-3 text-info">
                                    <i class="bi bi-wind fs-4"></i>
                                </div>
                                <div>
                                    <div class="fw-bold brand-text">Guided Breathing</div>
                                    <small class="text-muted">4-7-8 Breathing Technique</small>
                                </div>
                            </div>
                            <i class="bi bi-chevron-right text-muted"></i>
                        </div>
                    </div>

                    <!-- Grounding -->
                    <div class="col-12">
                        <div class="glass-card border-0 p-3 d-flex align-items-center justify-content-between transition-hover"
                            style="border-radius: 1.25rem; cursor: pointer;" onclick="openGroundingModal()">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-success bg-opacity-10 p-3 me-3 text-success">
                                    <i class="bi bi-sign-stop fs-4"></i> <!-- Anchor substitute -->
                                </div>
                                <div>
                                    <div class="fw-bold brand-text">Grounding</div>
                                    <small class="text-muted">5-4-3-2-1 Technique</small>
                                </div>
                            </div>
                            <i class="bi bi-chevron-right text-muted"></i>
                        </div>
                    </div>

                    <!-- Reach Out -->
                    <div class="col-12">
                        <a href="tel:" class="text-decoration-none"> <!-- Ideally links to contacts or prompts -->
                            <div class="glass-card border-0 p-3 d-flex align-items-center justify-content-between transition-hover"
                                style="border-radius: 1.25rem;">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-warning bg-opacity-10 p-3 me-3 text-warning">
                                        <i class="bi bi-people-fill fs-4"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold brand-text">Reach Out</div>
                                        <small class="text-muted">Call a Friend</small>
                                    </div>
                                </div>
                                <i class="bi bi-telephone text-muted"></i>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Section D: Professional Resources -->
                <div class="glass-card border-0 p-4 mb-4" style="border-radius: 1.5rem;">
                    <h6 class="fw-bold brand-text mb-3">Professional Resources</h6>
                    <div class="list-group list-group-flush bg-transparent">
                        @php
                            $resources = \App\Models\CrisisResource::where('is_active', true)->whereIn('type', ['website', 'organization'])->get();
                        @endphp

                        @foreach($resources as $resource)
                            <a href="{{ $resource->url ?? '#' }}" target="_blank"
                                class="list-group-item list-group-item-action bg-transparent border-light py-2 d-flex justify-content-between align-items-center ps-0">
                                <span class="brand-text">{{ $resource->name }}</span>
                                <i class="bi bi-box-arrow-up-right text-muted small"></i>
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Breathing Modal (Unchanged Layout Logic) -->
    <div class="modal fade" id="breathingModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg text-center p-4" style="border-radius: 2rem;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold">Guided Breathing</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="py-4">
                    <div id="breathingCircle"
                        class="rounded-circle d-flex align-items-center justify-content-center mx-auto text-white fw-bold shadow-sm"
                        style="width: 150px; height: 150px; background-color: #A8DADC; transition: all 4s ease-in-out;">
                        <span id="breathingText" class="fs-4">Ready?</span>
                    </div>
                    <p class="text-muted mt-4 small">4-7-8 Technique</p>
                    <button id="startBreathingBtn" class="btn btn-primary btn-pill px-4 mt-2">Start</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Grounding Modal (Unchanged Layout Logic) -->
    <div class="modal fade" id="groundingModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg text-center p-4" style="border-radius: 2rem;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold">5-4-3-2-1 Grounding</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="py-4">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto text-white fw-bold shadow-sm mb-4"
                        style="width: 80px; height: 80px; background-color: #FFCDB2; font-size: 2rem;">
                        <span id="groundingStepNum" class="text-dark">5</span>
                    </div>
                    <h6 id="groundingTitle" class="fw-bold text-dark">Name 5 things you can see</h6>
                    <p id="groundingDesc" class="text-muted small mb-4">Look around you.</p>
                    <button id="nextGroundingBtn" class="btn btn-dark btn-pill px-5"
                        style="background-color: #FFCDB2; border:none; color: #7c2d12;">Next</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Wait for Bootstrap to be loaded
        function waitForBootstrap(callback) {
            if (window.bootstrap) {
                callback();
            } else {
                setTimeout(() => waitForBootstrap(callback), 100);
            }
        }

        waitForBootstrap(() => {
            // --- Guided Breathing Logic ---
            const breathingModalEl = document.getElementById('breathingModal');
            const breathingModal = new bootstrap.Modal(breathingModalEl);
            const circle = document.getElementById('breathingCircle');
            const text = document.getElementById('breathingText');
            const startBtn = document.getElementById('startBreathingBtn');
            let breathingInterval;

            window.openBreathingModal = function () {
                breathingModal.show();
            }

            startBtn.addEventListener('click', () => {
                startBtn.style.display = 'none';
                runBreathingCycle(); // Start immediately
                // Cycle total: 4s (Inhale) + 7s (Hold) + 8s (Exhale) = 19s
                breathingInterval = setInterval(runBreathingCycle, 19000);
            });

            function runBreathingCycle() {
                // Inhale (4s)
                text.innerText = 'Inhale';
                circle.style.transition = 'all 4s ease-in-out';
                circle.style.transform = 'scale(1.5)';
                circle.style.backgroundColor = '#457b9d'; // Darker blue

                setTimeout(() => {
                    // Hold (7s)
                    text.innerText = 'Hold';
                    circle.style.transition = 'all 0.5s ease-in-out';
                    // Subtle pulse or static
                    circle.style.transform = 'scale(1.55)';

                    setTimeout(() => {
                        // Exhale (8s)
                        text.innerText = 'Exhale';
                        circle.style.transition = 'all 8s ease-out';
                        circle.style.transform = 'scale(1)';
                        circle.style.backgroundColor = '#A8DADC'; // Back to original

                    }, 7000); // Wait 7s for Hold
                }, 4000); // Wait 4s for Inhale
            }

            breathingModalEl.addEventListener('hidden.bs.modal', () => {
                clearInterval(breathingInterval);
                startBtn.style.display = 'inline-block';
                text.innerText = 'Ready?';
                circle.style.transform = 'scale(1)';
                circle.style.backgroundColor = '#A8DADC';
            });


            // --- Grounding Logic ---
            const groundingModalEl = document.getElementById('groundingModal');
            const groundingModal = new bootstrap.Modal(groundingModalEl);
            const stepNum = document.getElementById('groundingStepNum');
            const title = document.getElementById('groundingTitle');
            const desc = document.getElementById('groundingDesc');
            const nextBtn = document.getElementById('nextGroundingBtn');

            const steps = [
                { num: 5, title: 'Name 5 things you can see', desc: 'Look around. Notice colors, shapes, and details you might usually miss.' },
                { num: 4, title: 'Name 4 things you can touch', desc: 'Notice the texture of your clothes, the chair, or your own hands.' },
                { num: 3, title: 'Name 3 things you can hear', desc: 'Listen close. Traffic, a bird, the hum of the fridge, or your breath.' },
                { num: 2, title: 'Name 2 things you can smell', desc: 'If you can\'t smell anything right now, recall your favorite scents.' },
                { num: 1, title: 'Name 1 thing you can taste', desc: 'A lingering taste, or just the feeling of your tongue.' }
            ];
            let currentStep = 0;

            window.openGroundingModal = function () {
                groundingModal.show();
                currentStep = 0;
                updateGroundingUI();
            }

            function updateGroundingUI() {
                // Simple fade effect
                const contentContainer = stepNum.parentElement.parentElement; // The .py-4 container roughly
                contentContainer.style.opacity = '0';
                contentContainer.style.transition = 'opacity 0.3s ease';

                setTimeout(() => {
                    if (currentStep < steps.length) {
                        stepNum.innerText = steps[currentStep].num;
                        stepNum.style.backgroundColor = '#FFCDB2';
                        stepNum.innerHTML = steps[currentStep].num;

                        title.innerText = steps[currentStep].title;
                        desc.innerText = steps[currentStep].desc;
                        nextBtn.innerText = 'Next';
                        nextBtn.onclick = () => {
                            currentStep++;
                            updateGroundingUI();
                        };
                    } else {
                        // Done state
                        stepNum.innerHTML = '<i class="bi bi-check-lg"></i>';
                        stepNum.style.backgroundColor = '#b7e4c7'; // Soft green
                        title.innerText = 'Great job!';
                        desc.innerText = 'Take a moment to feel the difference.';
                        nextBtn.innerText = 'Close';
                        nextBtn.onclick = () => groundingModal.hide();
                    }
                    contentContainer.style.opacity = '1';
                }, 300);
            }
        });
    </script>
@endsection