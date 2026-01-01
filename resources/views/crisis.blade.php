@extends('layouts.app')

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
    </style>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <!-- Header -->
                <div class="text-center mb-4 position-relative">
                    <a href="{{ route('home') }}"
                        class="btn btn-light rounded-circle shadow-sm position-absolute start-0 top-50 translate-middle-y"
                        style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                    <h4 class="fw-bold mb-0 text-warm-dark">Crisis Support</h4>
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
                <h6 class="fw-bold text-warm-dark mb-3 ps-1">24/7 Crisis Hotlines - Kenya</h6>
                <div class="row g-3 mb-5">
                    <!-- Befrienders -->
                    <div class="col-12 col-md-6">
                        <div class="glass-card border-0 p-3 h-100 d-flex flex-column justify-content-between"
                            style="border-radius: 1.25rem;">
                            <div class="mb-3">
                                <h6 class="fw-bold text-dark mb-1">Befrienders Kenya</h6>
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
                                <h6 class="fw-bold text-dark mb-1">Child Helpline Kenya</h6>
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
                                <h6 class="fw-bold text-dark mb-1">Gender Violence Recovery</h6>
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
                <h6 class="fw-bold text-warm-dark mb-3 ps-1">Calm Down Now</h6>
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
                                    <div class="fw-bold text-dark">Guided Breathing</div>
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
                                    <div class="fw-bold text-dark">Grounding</div>
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
                                        <div class="fw-bold text-dark">Reach Out</div>
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
                    <h6 class="fw-bold text-warm-dark mb-3">Professional Resources</h6>
                    <div class="list-group list-group-flush bg-transparent">
                        <a href="#"
                            class="list-group-item list-group-item-action bg-transparent border-light py-2 d-flex justify-content-between align-items-center ps-0">
                            <span class="text-dark">Basic Needs Kenya</span>
                            <i class="bi bi-box-arrow-up-right text-muted small"></i>
                        </a>
                        <a href="#"
                            class="list-group-item list-group-item-action bg-transparent border-light py-2 d-flex justify-content-between align-items-center ps-0">
                            <span class="text-dark">Mental Health Kenya</span>
                            <i class="bi bi-box-arrow-up-right text-muted small"></i>
                        </a>
                        <a href="#"
                            class="list-group-item list-group-item-action bg-transparent border-0 py-2 d-flex justify-content-between align-items-center ps-0">
                            <span class="text-dark">WHO Mental Health</span>
                            <i class="bi bi-box-arrow-up-right text-muted small"></i>
                        </a>
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
        // Logic remains same (simplified for brevity in this response, but fully included in file)
        // Breathing
        const breathingModal = new bootstrap.Modal(document.getElementById('breathingModal'));
        const circle = document.getElementById('breathingCircle');
        const text = document.getElementById('breathingText');
        const startBtn = document.getElementById('startBreathingBtn');
        let breathingInterval;

        function openBreathingModal() { breathingModal.show(); }

        startBtn.addEventListener('click', () => {
            startBtn.style.display = 'none';
            text.innerText = 'Inhale';
            circle.style.transform = 'scale(1.2)';
            runBreathingCycle();
            breathingInterval = setInterval(runBreathingCycle, 19000);
        });

        function runBreathingCycle() {
            text.innerText = 'Inhale'; circle.style.transform = 'scale(1.3)'; circle.style.transition = 'all 4s ease-in-out';
            setTimeout(() => {
                text.innerText = 'Hold';
                setTimeout(() => {
                    text.innerText = 'Exhale'; circle.style.transform = 'scale(1)'; circle.style.transition = 'all 8s ease-in-out';
                }, 7000);
            }, 4000);
        }
        document.getElementById('breathingModal').addEventListener('hidden.bs.modal', () => {
            clearInterval(breathingInterval); startBtn.style.display = 'inline-block'; text.innerText = 'Ready?'; circle.style.transform = 'scale(1)';
        });

        // Grounding
        const groundingModal = new bootstrap.Modal(document.getElementById('groundingModal'));
        const stepNum = document.getElementById('groundingStepNum');
        const title = document.getElementById('groundingTitle');
        const desc = document.getElementById('groundingDesc');
        const nextBtn = document.getElementById('nextGroundingBtn');
        const steps = [
            { num: 5, title: 'Name 5 things you can see', desc: 'Look around and notice details.' },
            { num: 4, title: 'Name 4 things you can touch', desc: 'Notice textures.' },
            { num: 3, title: 'Name 3 things you can hear', desc: 'Listen for subtle sounds.' },
            { num: 2, title: 'Name 2 things you can smell', desc: 'Or favorite smells.' },
            { num: 1, title: 'Name 1 thing you can taste', desc: 'Focus on any taste.' }
        ];
        let currentStep = 0;

        function openGroundingModal() { groundingModal.show(); currentStep = 0; updateGroundingUI(); }
        function updateGroundingUI() {
            if (currentStep < steps.length) {
                stepNum.innerText = steps[currentStep].num; title.innerText = steps[currentStep].title; desc.innerText = steps[currentStep].desc; nextBtn.innerText = 'Next';
                nextBtn.onclick = () => { currentStep++; updateGroundingUI(); };
            } else {
                stepNum.innerHTML = '<i class="bi bi-check-lg"></i>'; title.innerText = 'Great job!'; desc.innerText = 'Take a moment.'; nextBtn.innerText = 'Close';
                nextBtn.onclick = () => groundingModal.hide();
            }
        }
    </script>
@endsection