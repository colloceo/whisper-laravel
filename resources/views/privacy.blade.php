@extends('layouts.app')

@section('page_title', 'Privacy Policy')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="glass-card p-4 p-md-5 overflow-hidden position-relative">
                    <!-- Decorative background elements -->
                    <div class="position-absolute top-0 end-0 p-5 opacity-10 d-none d-md-block">
                        <i class="bi bi-shield-check" style="font-size: 15rem;"></i>
                    </div>

                    <div class="position-relative z-1">
                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-box me-3 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 50px; height: 50px;">
                                <i class="bi bi-shield-lock-fill fs-4"></i>
                            </div>
                            <div>
                                <h1 class="h2 fw-bold mb-0">Privacy Policy</h1>
                                <p class="text-muted mb-0 small uppercase letter-spacing-1">Last Updated: January 9, 2026
                                </p>
                            </div>
                        </div>

                        <div class="intro-text mb-5">
                            <p class="lead">At <strong>Whispr.</strong>, your privacy isn't just a policy, it's our
                                foundation. We believe that your thoughts, feelings, and personal data belong to you and no
                                one else.</p>
                        </div>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <div
                                    class="policy-section p-4 rounded-4 h-100 bg-opacity-10 bg-primary border border-primary border-opacity-10">
                                    <h3 class="h5 fw-bold mb-3"><i class="bi bi-collection me-2"></i> Data We Collect</h3>
                                    <p class="small text-muted mb-0">We only collect the minimum information necessary to
                                        provide you with a safe space for journaling and peer support. This includes your
                                        basic profile info and the content you choose to share.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div
                                    class="policy-section p-4 rounded-4 h-100 bg-opacity-10 bg-info border border-info border-opacity-10">
                                    <h3 class="h5 fw-bold mb-3"><i class="bi bi-gear-fill me-2"></i> How We Use It</h3>
                                    <p class="small text-muted mb-0">Your data is used to personalize your experience,
                                        provide AI-driven insights for your mental well-being, and facilitate secure
                                        peer-to-peer communication.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div
                                    class="policy-section p-4 rounded-4 h-100 bg-opacity-10 bg-warning border border-warning border-opacity-10">
                                    <h3 class="h5 fw-bold mb-3"><i class="bi bi-lock-fill me-2"></i> Data Security</h3>
                                    <p class="small text-muted mb-0">We use industry-standard encryption to protect your
                                        data both at rest and in transit. Your private journals are encrypted and accessible
                                        only by you.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div
                                    class="policy-section p-4 rounded-4 h-100 bg-opacity-10 bg-success border border-success border-opacity-10">
                                    <h3 class="h5 fw-bold mb-3"><i class="bi bi-person-check-fill me-2"></i> Your Rights
                                    </h3>
                                    <p class="small text-muted mb-0">You have the right to access, export, or permanently
                                        delete your data at any time. We make it easy for you to take your data with you or
                                        clear your history.</p>
                                </div>
                            </div>
                        </div>

                        <hr class="my-5 opacity-10">

                        <div class="detailed-content">
                            <h2 class="h4 fw-bold mb-4">Detailed Information</h2>

                            <div class="accordion accordion-flush" id="privacyAccordion">
                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header">
                                        <button
                                            class="accordion-button collapsed px-0 bg-transparent shadow-none fw-semibold"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                            1. Information Collection and Use
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse"
                                        data-bs-parent="#privacyAccordion">
                                        <div class="accordion-body px-0 text-muted">
                                            <p>For a better experience, while using our Service, we may require you to
                                                provide us with certain personally identifiable information, including but
                                                not limited to email address, name, and mood data. The information that we
                                                request will be retained by us and used as described in this privacy policy.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header">
                                        <button
                                            class="accordion-button collapsed px-0 bg-transparent shadow-none fw-semibold"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                            2. Log Data
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#privacyAccordion">
                                        <div class="accordion-body px-0 text-muted">
                                            <p>We want to inform you that whenever you use our Service, in a case of an
                                                error in the app we collect data and information (through third-party
                                                products) on your phone called Log Data. This Log Data may include
                                                information such as your device Internet Protocol (“IP”) address, device
                                                name, operating system version, the configuration of the app when utilizing
                                                our Service, the time and date of your use of the Service, and other
                                                statistics.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header">
                                        <button
                                            class="accordion-button collapsed px-0 bg-transparent shadow-none fw-semibold"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                            3. Cookies
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        data-bs-parent="#privacyAccordion">
                                        <div class="accordion-body px-0 text-muted">
                                            <p>Cookies are files with a small amount of data that are commonly used as
                                                anonymous unique identifiers. These are sent to your browser from the
                                                websites that you visit and are stored on your device's internal memory.
                                                This Service does not use these “cookies” explicitly. However, the app may
                                                use third-party code and libraries that use “cookies” to collect information
                                                and improve their services.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">
                            <a href="{{ route('profile') }}" class="btn btn-primary btn-pill px-4">
                                <i class="bi bi-arrow-left me-2"></i> Back to Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .letter-spacing-1 {
            letter-spacing: 1px;
        }

        .policy-section {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .policy-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        }

        .accordion-button:not(.collapsed) {
            color: var(--whisper-blue);
            background-color: transparent;
        }

        .icon-box {
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }
    </style>
@endsection