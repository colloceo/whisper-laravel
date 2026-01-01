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

        /* Hide Guest Navbar */
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
        .input-group-auth {
            position: relative;
            margin-bottom: 1rem;
        }

        .form-control-auth {
            background: rgba(255, 255, 255, 0.5);
            border: none;
            border-radius: 15px;
            padding: 12px 20px 12px 45px;
            /* Left padding for icon */
            font-size: 0.95rem;
            color: #1e293b;
            width: 100%;
            transition: all 0.3s ease;
        }

        .form-control-auth:focus {
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 0 3px rgba(178, 203, 242, 0.5);
            outline: none;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 12px;
            color: #94a3b8;
            font-size: 1.1rem;
            z-index: 10;
            pointer-events: none;
            /* Let clicks pass through */
        }

        /* Custom Checkbox */
        .form-check-input {
            width: 1.2em;
            height: 1.2em;
            margin-top: 0;
            border-radius: 4px;
            border: 1px solid #cbd5e1;
            background-color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: var(--whisper-blue, #b2cbf2);
            border-color: var(--whisper-blue, #b2cbf2);
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

        /* Divider */
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
    </style>

    <div class="glass-card-auth">
        <h2 class="auth-heading">Welcome Back</h2>
        <p class="auth-subtext">Your safe space is waiting.</p>

        <!-- Google Login -->
        <a href="{{ route('auth.google') }}" class="btn-google">
            <i class="bi bi-google"></i> Continue with Google
        </a>

        <div class="divider">or</div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="input-group-auth text-start">
                <i class="bi bi-envelope input-icon"></i>
                <input id="email" type="email" class="form-control-auth @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">

                @error('email')
                    <span class="invalid-feedback d-block ps-2 mb-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Password --}}
            <div class="input-group-auth text-start">
                <i class="bi bi-lock input-icon"></i>
                <input id="password" type="password" class="form-control-auth @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password" placeholder="Password">

                <!-- Toggle Icon -->
                <i class="bi bi-eye position-absolute" style="right: 15px; top: 12px; cursor: pointer; color: #94a3b8;"
                    onclick="togglePassword('password', this)"></i>

                @error('password')
                    <span class="invalid-feedback d-block ps-2 mb-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Controls: Remember Me & Forgot Password --}}
            <div class="d-flex justify-content-between align-items-center mb-3 px-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label small text-muted ms-1" for="remember">
                        Remember Me
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a class="text-decoration-none small fw-bold" href="{{ route('password.request') }}"
                        style="color: var(--whisper-purple, #b2cbf2);">
                        Forgot Password?
                    </a>
                @endif
            </div>

            <button type="submit" class="btn-submit-auth">
                Enter Sanctuary
            </button>
        </form>

        <div class="mt-4 text-muted small">
            New to Whispr? <a href="{{ route('register') }}" class="text-decoration-none fw-bold"
                style="color: #64748b;">Create an Account</a>
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