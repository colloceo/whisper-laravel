@extends('layouts.app')

@section('page_title', 'Terms of Service')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="glass-card p-4 p-md-5 overflow-hidden position-relative">
                    <!-- Decorative background elements -->
                    <div class="position-absolute top-0 end-0 p-5 opacity-10 d-none d-md-block">
                        <i class="bi bi-file-earmark-text" style="font-size: 15rem;"></i>
                    </div>

                    <div class="position-relative z-1">
                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-box me-3 bg-indigo text-white rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 50px; height: 50px; background: #6610f2;">
                                <i class="bi bi-journal-check fs-4"></i>
                            </div>
                            <div>
                                <h1 class="h2 fw-bold mb-0">Terms of Service</h1>
                                <p class="text-muted mb-0 small uppercase letter-spacing-1">Last Updated: January 9, 2026
                                </p>
                            </div>
                        </div>

                        <div class="intro-text mb-5">
                            <p class="lead">Welcome to <strong>Whispr.</strong> By accessing or using our platform, you
                                agree to be bound by these terms. We've kept them simple and transparent, just like our
                                mission.</p>
                        </div>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="policy-section p-4 rounded-4 h-100 bg-opacity-10 bg-indigo border border-indigo border-opacity-10"
                                    style="background-color: rgba(102, 16, 242, 0.05); border-color: rgba(102, 16, 242, 0.1);">
                                    <h3 class="h5 fw-bold mb-3"><i class="bi bi-people-fill me-2"></i> Community Conduct
                                    </h3>
                                    <p class="small text-muted mb-0">Whispr is a safe space. You agree to treat all members
                                        with respect, empathy, and kindness. Harassment, hate speech, or bullying of any
                                        kind will not be tolerated.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div
                                    class="policy-section p-4 rounded-4 h-100 bg-opacity-10 bg-primary border border-primary border-opacity-10">
                                    <h3 class="h5 fw-bold mb-3"><i class="bi bi-patch-check-fill me-2"></i> Your
                                        Responsibility</h3>
                                    <p class="small text-muted mb-0">You are responsible for the content you post and the
                                        interactions you have. While we provide the platform, the quality of our community
                                        depends on you.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div
                                    class="policy-section p-4 rounded-4 h-100 bg-opacity-10 bg-info border border-info border-opacity-10">
                                    <h3 class="h5 fw-bold mb-3"><i class="bi bi-shield-shaded me-2"></i> Account Security
                                    </h3>
                                    <p class="small text-muted mb-0">You are responsible for maintaining the security of
                                        your account credentials. Notify us immediately if you suspect any unauthorized
                                        access.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div
                                    class="policy-section p-4 rounded-4 h-100 bg-opacity-10 bg-secondary border border-secondary border-opacity-10">
                                    <h3 class="h5 fw-bold mb-3"><i class="bi bi-x-circle-fill me-2"></i> Termination</h3>
                                    <p class="small text-muted mb-0">We reserve the right to suspend or terminate accounts
                                        that violate our community guidelines or these terms, to ensure the safety of all
                                        users.</p>
                                </div>
                            </div>
                        </div>

                        <hr class="my-5 opacity-10">

                        <div class="detailed-content">
                            <h2 class="h4 fw-bold mb-4">Full Terms</h2>

                            <div class="accordion accordion-flush" id="termsAccordion">
                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header">
                                        <button
                                            class="accordion-button collapsed px-0 bg-transparent shadow-none fw-semibold"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#termsOne">
                                            1. Acceptance of Terms
                                        </button>
                                    </h2>
                                    <div id="termsOne" class="accordion-collapse collapse" data-bs-parent="#termsAccordion">
                                        <div class="accordion-body px-0 text-muted">
                                            <p>By accessing or using the Whispr platform, you agree to be bound by these
                                                Terms of Service and all applicable laws and regulations. If you do not
                                                agree with any of these terms, you are prohibited from using or accessing
                                                this site.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header">
                                        <button
                                            class="accordion-button collapsed px-0 bg-transparent shadow-none fw-semibold"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#termsTwo">
                                            2. Use License
                                        </button>
                                    </h2>
                                    <div id="termsTwo" class="accordion-collapse collapse" data-bs-parent="#termsAccordion">
                                        <div class="accordion-body px-0 text-muted">
                                            <p>Permission is granted to temporarily download one copy of the materials
                                                (information or software) on Whispr's website for personal, non-commercial
                                                transitory viewing only.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header">
                                        <button
                                            class="accordion-button collapsed px-0 bg-transparent shadow-none fw-semibold"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#termsThree">
                                            3. Disclaimer
                                        </button>
                                    </h2>
                                    <div id="termsThree" class="accordion-collapse collapse"
                                        data-bs-parent="#termsAccordion">
                                        <div class="accordion-body px-0 text-muted">
                                            <p>The materials on Whispr's website are provided on an 'as is' basis. Whispr
                                                makes no warranties, expressed or implied, and hereby disclaims and negates
                                                all other warranties including, without limitation, implied warranties or
                                                conditions of merchantability, fitness for a particular purpose, or
                                                non-infringement of intellectual property or other violation of rights.</p>
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
            box-shadow: 0 4px 15px rgba(102, 16, 242, 0.3);
        }
    </style>
@endsection