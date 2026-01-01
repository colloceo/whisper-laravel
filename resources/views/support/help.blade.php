@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">

                <!-- Header -->
                <div class="text-center mb-4 position-relative">
                    <a href="{{ route('profile') }}"
                        class="btn btn-light rounded-circle shadow-sm position-absolute start-0 top-50 translate-middle-y"
                        style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                    <h4 class="fw-bold mb-0" style="color: #1e293b;">Help Center</h4>
                    <p class="text-muted small mb-0">Get answers to common questions</p>
                </div>

                <!-- Getting Started -->
                <div class="glass-card border-0 shadow-sm mb-3" style="border-radius: 1.5rem;">
                    <div class="card-body p-4">
                        <h6 class="fw-bold text-dark mb-3">Getting Started</h6>

                        <div class="accordion accordion-flush" id="accordionStarting">
                            <div class="accordion-item border-0 mb-2 rounded-3 bg-transparent">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-transparent shadow-none fw-medium small"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                        How do I start using Whispr?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionStarting">
                                    <div class="accordion-body text-muted small pt-0">
                                        Simply create an anonymous account and start journaling or chatting. Your identity
                                        is generated automatically to keep you safe.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0 rounded-3 bg-transparent">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-transparent shadow-none fw-medium small"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                        Is my data safe and private?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionStarting">
                                    <div class="accordion-body text-muted small pt-0">
                                        Yes. We do not ask for real names or emails. All data is stored securely and we do
                                        not track your location.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Features -->
                <div class="glass-card border-0 shadow-sm mb-3" style="border-radius: 1.5rem;">
                    <div class="card-body p-4">
                        <h6 class="fw-bold text-dark mb-3">Features</h6>

                        <div class="accordion accordion-flush" id="accordionFeatures">
                            <div class="accordion-item border-0 mb-2 rounded-3 bg-transparent">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-transparent shadow-none fw-medium small"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                        How does the AI journal work?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFeatures">
                                    <div class="accordion-body text-muted small pt-0">
                                        Our compassionate AI analyzes your journal entries to offer gentle reflections and
                                        insights, helping you process your emotions.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0 rounded-3 bg-transparent">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-transparent shadow-none fw-medium small"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                        Can I chat with others anonymously?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFeatures">
                                    <div class="accordion-body text-muted small pt-0">
                                        Absolutely. The Peer Chat allows you to connect with community members using your
                                        anonymous alias.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Crisis Support -->
                <div class="glass-card border-0 shadow-sm mb-4" style="border-radius: 1.5rem;">
                    <div class="card-body p-4">
                        <h6 class="fw-bold text-dark mb-3">Crisis Support</h6>

                        <div class="accordion accordion-flush" id="accordionCrisis">
                            <div class="accordion-item border-0 rounded-3 bg-transparent">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-transparent shadow-none fw-medium small"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive">
                                        What should I do in a mental health emergency?
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionCrisis">
                                    <div class="accordion-body text-muted small pt-0">
                                        Please visit our <a href="{{ route('crisis') }}">Crisis Support</a> page immediately
                                        to find hotline numbers and emergency resources.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Still need help -->
                <div class="card border-0 shadow-sm mb-4" style="border-radius: 1.5rem;">
                    <div class="card-body p-4">
                        <h6 class="fw-bold text-dark mb-2">Still need help?</h6>
                        <p class="text-muted small mb-3">Can't find what you're looking for? Our support team is here to
                            help.</p>
                        <a href="{{ route('support.contact') }}" class="btn btn-primary w-100 rounded-pill fw-bold"
                            style="background-color: #2563eb;">Contact Support</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection