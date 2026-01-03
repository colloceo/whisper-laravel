@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">

                <!-- Header -->
                <div class="text-center mb-5">
                    <h4 class="fw-bold mb-1" style="color: #1e293b; font-family: 'Poppins', sans-serif;">Profile</h4>
                    <p class="text-muted" style="font-family: 'Inter', sans-serif;">Your wellness journey</p>
                </div>

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
                    <p class="text-muted small mb-0">Current Session</p>

                    <!-- Decorative blur -->
                    <div
                        class="position-absolute top-0 start-0 translate-middle p-5 rounded-circle bg-primary opacity-10 blur-3xl">
                    </div>
                    <div
                        class="position-absolute bottom-0 end-0 translate-middle p-5 rounded-circle bg-purple opacity-10 blur-3xl">
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

                    <!-- Daily Reminders -->
                    <div class="glass-card border-0 p-3 mb-3 d-flex justify-content-between align-items-center"
                        style="border-radius: 1.25rem;">
                        <div>
                            <div class="fw-bold text-dark" style="font-size: 0.95rem;">Daily Reminders</div>
                            <div class="text-muted small" style="font-size: 0.75rem;">Get gentle reminders to check in</div>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" checked
                                style="width: 2.5em; height: 1.25em;">
                        </div>
                    </div>

                    <!-- Crisis Alerts -->
                    <div class="glass-card border-0 p-3 mb-3 d-flex justify-content-between align-items-center"
                        style="border-radius: 1.25rem;">
                        <div>
                            <div class="fw-bold text-dark" style="font-size: 0.95rem;">Crisis Alerts</div>
                            <div class="text-muted small" style="font-size: 0.75rem;">Emergency support notifications</div>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" checked
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
                            <input class="form-check-input" type="checkbox" role="switch"
                                style="width: 2.5em; height: 1.25em;">
                        </div>
                    </div>

                    <!-- Dark Mode -->
                    <div class="glass-card border-0 p-3 mb-3 d-flex justify-content-between align-items-center"
                        style="border-radius: 1.25rem;">
                        <div>
                            <div class="fw-bold text-dark" style="font-size: 0.95rem;">Dark Mode</div>
                            <div class="text-muted small" style="font-size: 0.75rem;">Easier on the eyes</div>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="darkModeToggle"
                                style="width: 2.5em; height: 1.25em;">
                        </div>
                    </div>
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
                                    });
                                </script>
                            @endpush

                        </div>
                    </div>
                </div>

                <!-- Logout -->
                <div class="text-center pb-4">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="btn btn-link text-danger text-decoration-none fw-bold" style="font-size: 0.9rem;">
                        Log Out
                    </a>
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