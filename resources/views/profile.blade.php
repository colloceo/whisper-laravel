@extends('layouts.app')
@section('page_title', 'Profile')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">

                <!-- Header -->
                <div class="text-center mb-5">
                    <h4 class="fw-bold mb-1 brand-text" style="font-family: 'Poppins', sans-serif;">Profile</h4>
                    <p class="text-muted" style="font-family: 'Inter', sans-serif;">Your wellness journey</p>
                </div>

                @if (session('status'))
                    <div id="status-alert"
                        class="alert alert-success glass-card border-0 mb-4 py-2 px-4 rounded-pill text-center small fw-bold text-success animate__animated animate__fadeInDown"
                        role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('status') }}
                    </div>
                @endif

                <!-- Profile Card -->
                <div class="glass-card border-0 p-4 mb-4 text-center position-relative overflow-hidden"
                    style="border-radius: 1.5rem;">

                    <!-- Avatar -->
                    <div class="d-flex justify-content-center mb-3">
                        <img src="https://ui-avatars.com/api/?name={{ $user->anonymous_username }}&background=b2cbf2&color=fff&rounded=true&size=128"
                            alt="Avatar" class="rounded-circle shadow-sm border border-4 border-white"
                            style="width: 80px; height: 80px;">
                    </div>

                    <!-- Info -->
                    <h5 class="fw-bold text-dark mb-1">{{ $user->anonymous_username }}</h5>
                    <p class="text-muted small mb-3">{{ $user->name ?: 'New Member' }}</p>

                    <!-- Edit Trigger (Repositioned & Restyled) -->
                    <button
                        class="btn btn-primary d-inline-flex align-items-center mx-auto px-4 py-2 rounded-pill fw-bold shadow-sm text-white border-0 mb-2"
                        style="font-size: 0.8rem; background: linear-gradient(135deg, #a8dadc 0%, #457b9d 100%);"
                        data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="bi bi-pencil-fill me-2"></i> Edit Profile
                    </button>

                    <!-- Decorative blur -->
                    <div
                        class="position-absolute top-0 start-0 translate-middle p-5 rounded-circle bg-primary opacity-10 blur-3xl">
                    </div>
                    <div
                        class="position-absolute bottom-0 end-0 translate-middle p-5 rounded-circle bg-purple opacity-10 blur-3xl">
                    </div>
                </div>

                <!-- Edit Profile Modal -->
                <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content glass-card border-0">
                            <div class="modal-header border-0 pb-0">
                                <h5 class="modal-title fw-bold brand-text" id="editProfileModalLabel">Update Profile</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body py-4">
                                    <div class="mb-4">
                                        <label for="anonymous_username"
                                            class="form-label small fw-bold text-muted text-uppercase letter-spacing-1">Anonymous
                                            Username</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-0 rounded-start-pill ps-3">
                                                <i class="bi bi-person-badge text-primary"></i>
                                            </span>
                                            <input type="text"
                                                class="form-control bg-light border-0 rounded-end-pill py-2 ms-n1"
                                                id="anonymous_username" name="anonymous_username"
                                                value="{{ old('anonymous_username', $user->anonymous_username) }}" required>
                                        </div>
                                        @error('anonymous_username')
                                            <div class="text-danger small mt-1 ps-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="name"
                                            class="form-label small fw-bold text-muted text-uppercase letter-spacing-1">Display
                                            Name (Optional)</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-0 rounded-start-pill ps-3">
                                                <i class="bi bi-person text-purple"></i>
                                            </span>
                                            <input type="text"
                                                class="form-control bg-light border-0 rounded-end-pill py-2 ms-n1" id="name"
                                                name="name" value="{{ old('name', $user->name) }}">
                                        </div>
                                    </div>

                                    <p class="text-muted small mb-0 px-2">
                                        <i class="bi bi-info-circle me-1"></i> Your anonymous username is how others see you
                                        in chat rooms.
                                    </p>
                                </div>
                                <div class="modal-footer border-0 pt-0 pb-4 justify-content-center">
                                    <button type="submit" class="btn btn-primary btn-pill px-5 border-0 shadow-sm"
                                        style="background: linear-gradient(135deg, #a8dadc 0%, #457b9d 100%);">
                                        Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="row g-3 mb-5">
                    <!-- Days Active -->
                    <div class="col-6 col-md-3">
                        <div class="glass-card border-0 p-3 text-center h-100 d-flex flex-column justify-content-center"
                            style="border-radius: 1.25rem;">
                            <h3 class="fw-bold text-primary mb-0">{{ $daysActive }}</h3>
                            <small class="text-muted" style="font-size: 0.7rem;">Days Active</small>
                        </div>
                    </div>
                    <!-- Journal Entries -->
                    <div class="col-6 col-md-3">
                        <div class="glass-card border-0 p-3 text-center h-100 d-flex flex-column justify-content-center"
                            style="border-radius: 1.25rem;">
                            <h3 class="fw-bold text-info mb-0">{{ $journalCount }}</h3>
                            <small class="text-muted" style="font-size: 0.7rem;">Journal Entries</small>
                        </div>
                    </div>
                    <!-- Saved Insights -->
                    <div class="col-6 col-md-3">
                        <div class="glass-card border-0 p-3 text-center h-100 d-flex flex-column justify-content-center"
                            style="border-radius: 1.25rem;">
                            <h3 class="fw-bold text-purple mb-0">{{ $savedInsights }}</h3>
                            <small class="text-muted" style="font-size: 0.7rem;">Saved Insights</small>
                        </div>
                    </div>
                    <!-- Mood Check-ins -->
                    <div class="col-6 col-md-3">
                        <div class="glass-card border-0 p-3 text-center h-100 d-flex flex-column justify-content-center"
                            style="border-radius: 1.25rem;">
                            <h3 class="fw-bold text-success mb-0">{{ $moodCheckins }}</h3>
                            <small class="text-muted" style="font-size: 0.7rem;">Mood Check-ins</small>
                        </div>
                    </div>
                </div>

                <!-- Settings Section -->
                <div class="mb-4">
                    <h6 class="fw-bold text-dark mb-3 ps-1">Settings</h6>

                    <form id="settings-form" action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Hidden inputs to ensure we send all values if needed, or we can just send the changed one -->
                        <input type="hidden" name="anonymous_username" value="{{ $user->anonymous_username }}">

                        <!-- Daily Reminders -->
                        <div class="glass-card border-0 p-3 mb-3 d-flex justify-content-between align-items-center"
                            style="border-radius: 1.25rem;">
                            <div>
                                <div class="fw-bold text-dark" style="font-size: 0.95rem;">Daily Reminders</div>
                                <div class="text-muted small" style="font-size: 0.75rem;">Get gentle reminders to check in
                                </div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="daily_reminders" role="switch"
                                    value="1" {{ $user->daily_reminders ? 'checked' : '' }} onchange="this.form.submit()"
                                    style="width: 2.5em; height: 1.25em;">
                            </div>
                        </div>

                        <!-- Crisis Alerts -->
                        <div class="glass-card border-0 p-3 mb-3 d-flex justify-content-between align-items-center"
                            style="border-radius: 1.25rem;">
                            <div>
                                <div class="fw-bold text-dark" style="font-size: 0.95rem;">Crisis Alerts</div>
                                <div class="text-muted small" style="font-size: 0.75rem;">Emergency support notifications
                                </div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="crisis_alerts" role="switch" value="1"
                                    {{ $user->crisis_alerts ? 'checked' : '' }} onchange="this.form.submit()"
                                    style="width: 2.5em; height: 1.25em;">
                            </div>
                        </div>

                        <!-- Anonymous Mode -->
                        <div class="glass-card border-0 p-3 mb-3 d-flex justify-content-between align-items-center"
                            style="border-radius: 1.25rem;">
                            <div>
                                <div class="fw-bold text-dark" style="font-size: 0.95rem;">Anonymous Mode</div>
                                <div class="text-muted small" style="font-size: 0.75rem;">Browse without saving data</div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="anonymous_mode" role="switch"
                                    value="1" {{ $user->anonymous_mode ? 'checked' : '' }} onchange="this.form.submit()"
                                    style="width: 2.5em; height: 1.25em;">
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Support & Resources -->
                <div class="mb-5">
                    <h6 class="fw-bold text-dark mb-3 ps-1">Support & Resources</h6>
                    <div class="glass-card border-0 overflow-hidden" style="border-radius: 1.25rem;">
                        <div class="list-group list-group-flush bg-transparent">

                            <a href="{{ route('support.help') }}"
                                class="list-group-item list-group-item-action bg-transparent border-light py-3 d-flex justify-content-between align-items-center">
                                <span class="text-dark fw-medium">Help Center</span>
                                <i class="bi bi-chevron-right text-muted small"></i>
                            </a>

                            <a href="{{ route('privacy') }}"
                                class="list-group-item list-group-item-action bg-transparent border-light py-3 d-flex justify-content-between align-items-center">
                                <span class="text-dark fw-medium">Privacy Policy</span>
                                <i class="bi bi-chevron-right text-muted small"></i>
                            </a>

                            <a href="{{ route('terms') }}"
                                class="list-group-item list-group-item-action bg-transparent border-light py-3 d-flex justify-content-between align-items-center">
                                <span class="text-dark fw-medium">Terms of Service</span>
                                <i class="bi bi-chevron-right text-muted small"></i>
                            </a>

                            <a href="{{ route('support.contact') }}"
                                class="list-group-item list-group-item-action bg-transparent border-light py-3 d-flex justify-content-between align-items-center">
                                <span class="text-dark fw-medium">Contact Support</span>
                                <i class="bi bi-chevron-right text-muted small"></i>
                            </a>

                            <div id="paypal-button-container" class="mt-3"></div>

                            @push('scripts')
                                <script
                                    src="https://www.paypal.com/sdk/js?client-id={{ config('paypal.sandbox.client_id') }}&currency=USD"></script>
                                <script>
                                    document.addEventListener("DOMContentLoaded", function () {
                                        if (typeof paypal !== 'undefined') {
                                            paypal.Buttons({
                                                style: {
                                                    layout: 'horizontal',
                                                    color: 'blue',
                                                    shape: 'pill',
                                                    label: 'donate'
                                                },
                                                createOrder: function (data, actions) {
                                                    return actions.order.create({
                                                        purchase_units: [{
                                                            amount: {
                                                                value: '5.00'
                                                            }
                                                        }]
                                                    });
                                                },
                                                onApprove: function (data, actions) {
                                                    return actions.order.capture().then(function (details) {
                                                        window.location.href = "{{ route('donate.success') }}";
                                                    });
                                                },
                                                onCancel: function (data) {
                                                    window.location.href = "{{ route('donate.cancel') }}";
                                                }
                                            }).render('#paypal-button-container');
                                        }

                                        // Auto-dismiss status alert
                                        const statusAlert = document.getElementById('status-alert');
                                        if (statusAlert) {
                                            setTimeout(() => {
                                                statusAlert.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                                                statusAlert.style.opacity = '0';
                                                statusAlert.style.transform = 'translateY(-20px)';
                                                setTimeout(() => {
                                                    statusAlert.remove();
                                                }, 500);
                                            }, 3000);
                                        }
                                    });
                                </script>
                            @endpush

                        </div>
                    </div>
                </div>

                <!-- Logout & Delete -->
                <div class="text-center pb-5">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="btn btn-link text-muted text-decoration-none fw-bold me-3" style="font-size: 0.9rem;">
                        Log Out
                    </a>

                    <form id="delete-account-form" action="{{ route('profile.destroy') }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Are you sure you want to permanently delete your account? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link text-danger text-decoration-none fw-bold"
                            style="font-size: 0.9rem;">
                            Delete Account
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <style>
        /* Custom Toggles Colors */
        .form-check-input:checked {
            background-color: var(--whisper-blue, #b2cbf2);
            border-color: var(--whisper-blue, #b2cbf2);
        }

        .text-purple {
            color: #CDB4DB;
        }

        .bg-purple {
            background-color: #CDB4DB;
        }

        /* Blur utilities if not in main CSS */
        .blur-3xl {
            filter: blur(64px);
        }
    </style>
@endsection