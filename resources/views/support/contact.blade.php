@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">

                <!-- Header -->
                <div class="text-center mb-4 position-relative">
                    <a href="{{ route('support.help') }}"
                        class="btn btn-light rounded-circle shadow-sm position-absolute start-0 top-50 translate-middle-y"
                        style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                    <h4 class="fw-bold mb-0 text-dark">Contact Support</h4>
                    <p class="text-muted small mb-0">Reach out for help</p>
                </div>

                <!-- Contact Form -->
                <div class="glass-card border-0 shadow-sm mb-4" style="border-radius: 1.5rem;">
                    <div class="card-body p-4">
                        <h6 class="fw-bold text-dark mb-3">Send us a message</h6>

                        @if(session('success'))
                            <div class="alert alert-success border-0 rounded-3 small mb-3">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('support.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label text-muted small fw-bold">Subject</label>
                                <select name="subject" class="form-select rounded-3 py-2 text-muted"
                                    style="font-size: 0.9rem;" required>
                                    <option value="" disabled selected>Choose a topic...</option>
                                    <option value="Bugs">Report a Bug</option>
                                    <option value="Account">Account Issues</option>
                                    <option value="Feedback">Feedback & Suggestions</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-muted small fw-bold">Email (optional)</label>
                                <input type="email" name="email" class="form-control rounded-3 py-2"
                                    placeholder="your@email.com" style="font-size: 0.9rem;">
                                <div class="form-text small text-muted">Leave blank to remain anonymous</div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label text-muted small fw-bold">Message</label>
                                <textarea name="message" class="form-control rounded-3 p-3" rows="4"
                                    placeholder="Describe your question or issue..."
                                    style="font-size: 0.9rem; resize: none;" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 rounded-pill fw-bold py-2 shadow-sm">Send
                                Message</button>
                        </form>
                    </div>
                </div>

                <!-- Quick Help -->
                <div class="glass-card border-0 shadow-sm mb-4" style="border-radius: 1.5rem;">
                    <div class="card-body p-4">
                        <h6 class="fw-bold text-dark mb-3">Quick Help</h6>

                        <div class="list-group list-group-flush bg-transparent">
                            <a href="{{ route('support.help') }}"
                                class="list-group-item list-group-item-action border-0 px-0 d-flex justify-content-between align-items-center bg-transparent">
                                <div>
                                    <div class="fw-bold text-dark small">FAQ</div>
                                    <div class="text-muted" style="font-size: 0.75rem;">Common questions and answers</div>
                                </div>
                                <i class="bi bi-chevron-right text-muted small"></i>
                            </a>
                            <a href="{{ route('crisis') }}"
                                class="list-group-item list-group-item-action border-0 px-0 d-flex justify-content-between align-items-center bg-transparent text-danger">
                                <div>
                                    <div class="fw-bold small">Crisis Support</div>
                                    <div class="text-danger opacity-75" style="font-size: 0.75rem;">Emergency resources and
                                        contacts</div>
                                </div>
                                <i class="bi bi-chevron-right text-danger small"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Official Email -->
                <div class="glass-card border-0 shadow-sm mb-4" style="border-radius: 1.5rem;">
                    <div class="card-body p-3 d-flex align-items-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 40px; height: 40px; background-color: #E0E7FF; color: #4F46E5;">
                            <i class="bi bi-envelope-at-fill"></i>
                        </div>
                        <div>
                            <div class="fw-bold text-dark small">Official Email</div>
                            <div class="text-muted" style="font-size: 0.75rem;">
                                <a href="mailto:whispr.w26@gmail.com"
                                    class="text-decoration-none text-muted">whispr.w26@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="glass-card border-0 shadow-sm mb-4" style="border-radius: 1.5rem;">
                    <div class="card-body p-3 d-flex align-items-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 40px; height: 40px; background-color: #DBEAFE; color: #2563EB;">
                            <i class="bi bi-clock"></i>
                        </div>
                        <div>
                            <div class="fw-bold text-dark small">Response Time</div>
                            <div class="text-muted" style="font-size: 0.75rem;">We typically respond within 24-48 hours
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection