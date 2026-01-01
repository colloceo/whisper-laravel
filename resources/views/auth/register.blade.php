@extends('layouts.app')

@section('content')
    <style>
        /* Override Layout Background */
        body {
            background: linear-gradient(135deg, #b2cbf2 0%, #CDB4DB 100%) !important;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Hide Guest Navbar from Layout to ensure full focus */
        .navbar {
            display: none !important;
        }

        /* Main Container */
        #app {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Glass Card */
        .glass-card-auth {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
            border-radius: 20px;
            padding: 3rem 2rem;
            width: 100%;
            max-width: 450px;
            text-align: center;
        }

        /* Typography */
        .auth-heading {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .auth-subtext {
            font-family: 'Inter', sans-serif;
            color: #64748b;
            font-size: 0.95rem;
            margin-bottom: 2rem;
        }

        /* Custom Inputs */
        .form-control-auth {
            background: rgba(255, 255, 255, 0.5);
            border: none;
            border-radius: 15px;
            padding: 12px 20px;
            font-size: 0.95rem;
            color: #1e293b;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .form-control-auth:focus {
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 0 3px rgba(178, 203, 242, 0.5);
            /* --whisper-blue glow */
            outline: none;
        }

        /* Submit Button */
        .btn-submit-auth {
            background-color: var(--whisper-blue, #b2cbf2);
            color: white;
            width: 100%;
            padding: 14px;
            border-radius: 50px;
            font-weight: 600;
            border: none;
            margin-top: 1rem;
            transition: transform 0.2s;
        }

        .btn-submit-auth:hover {
            opacity: 0.9;
            color: white;
        }

        .btn-submit-auth:active {
            transform: scale(0.98);
        }

        /* Social Divider */
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1.5rem 0;
            color: #94a3b8;
            font-size: 0.85rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .divider::before {
            margin-right: .5em;
        }

        .divider::after {
            margin-left: .5em;
        }

        /* Google Button */
        .btn-google {
            background: white;
            color: #1e293b;
            width: 100%;
            padding: 12px;
            border-radius: 50px;
            font-weight: 500;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            text-decoration: none;
            transition: background 0.2s;
        }

        .btn-google:hover {
            background: #f8fafc;
            color: #1e293b;
        }
    </style>

    <div class="glass-card-auth">
        <h2 class="auth-heading">Create your Sanctuary</h2>
        <p class="auth-subtext">Join anonymously. Heal privately.</p>

        <!-- Google Login -->
        <a href="{{ route('auth.google') }}" class="btn-google">
            <i class="bi bi-google"></i> Continue with Google
        </a>

        <div class="divider">or</div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Email --}}
            <div class="text-start">
                <input id="email" type="email" class="form-control-auth @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" placeholder="name@example.com">

                @error('email')
                    <span class="invalid-feedback d-block ps-2 mb-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Password --}}
            <div class="text-start position-relative">
                <input id="password" type="password" class="form-control-auth @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password" placeholder="Password">

                <!-- Simple Toggle Icon (Positioned Absolute) -->
                <i class="bi bi-eye position-absolute" style="right: 15px; top: 12px; cursor: pointer; color: #94a3b8;"
                    onclick="togglePassword('password', this)"></i>

                @error('password')
                    <span class="invalid-feedback d-block ps-2 mb-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="text-start position-relative">
                <input id="password-confirm" type="password" class="form-control-auth" name="password_confirmation" required
                    autocomplete="new-password" placeholder="Confirm Password">
            </div>

            <button type="submit" class="btn-submit-auth">
                Start my Journey
            </button>
        </form>

        <div class="mt-4 text-muted small">
            Already have a space? <a href="{{ route('login') }}" class="text-decoration-none fw-bold"
                style="color: #64748b;">Log In</a>
        </div>
    </div>

    <script>
        function togglePassword(inputId, icon) {
            const input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                input.type = "password";
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        }
    </script>
@endsection