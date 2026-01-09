<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Whispr') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            /* Animated Gradient Background */
            background: linear-gradient(135deg, #b2cbf2, #CDB4DB, #b2cbf2);
            background-size: 200% 200%;
            animation: gradientMove 10s ease infinite;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            font-family: 'Inter', sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        @keyframes gradientMove {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Splash Screen */
        .splash-content {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            transition: all 1s ease-out;
            z-index: 20;
        }

        .splash-content.minimized {
            top: 15%;
            transform: translate(-50%, 0) scale(0.8);
        }

        .logo-text {
            font-family: 'Poppins', sans-serif;
            font-size: 3.5rem;
            font-weight: 700;
            color: #fff;
            text-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 0.5rem;
            animation: pulse 3s infinite ease-in-out;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.05);
                opacity: 0.9;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .tagline {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.95);
            font-weight: 500;
            margin-bottom: 2rem;
            opacity: 0;
            animation: fadeIn 1s ease-out 0.5s forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        /* Slider Card */
        .slider-card {
            background: rgba(255, 255, 255, 0.85);
            /* Slightly more opaque for readability */
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
            border-radius: 24px;
            padding: 2.5rem 2rem;
            max-width: 400px;
            width: 90%;
            text-align: center;
            position: fixed;
            bottom: -100%;
            /* Start off-screen */
            left: 50%;
            transform: translateX(-50%);
            transition: bottom 0.8s cubic-bezier(0.19, 1, 0.22, 1);
            z-index: 10;
            height: 60vh;
            /* Occupy significant space */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .slider-card.visible {
            bottom: 30px;
            /* Float slightly above bottom */
        }

        .slide {
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            animation: slideIn 0.5s ease-out;
        }

        .slide.active {
            display: flex;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .icon-container {
            font-size: 4rem;
            margin-bottom: 1.5rem;
        }

        /* Icons Colors */
        .icon-teal {
            color: var(--whisper-teal, #A8DADC);
        }

        .icon-warm {
            color: var(--whisper-warm, #FFCDB2);
        }

        .card-headline {
            font-family: 'Poppins', sans-serif;
            font-size: 1.6rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .card-body-text {
            color: #64748b;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        /* Dots */
        .dots-container {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: auto;
            margin-bottom: 1.5rem;
        }

        .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #cbd5e1;
            transition: all 0.3s;
        }

        .dot.active {
            background: var(--whisper-blue, #b2cbf2);
            width: 24px;
            border-radius: 12px;
        }

        /* Buttons */
        .btn-action {
            width: 100%;
            padding: 14px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: transform 0.1s;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
        }

        .btn-action:active {
            transform: scale(0.98);
        }

        .btn-primary-pill {
            background: linear-gradient(90deg, #b2cbf2, #A8DADC);
            color: #fff;
            box-shadow: 0 4px 10px rgba(168, 218, 220, 0.4);
        }

        .btn-google {
            background: #fff;
            color: #1e293b;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            margin-bottom: 0.8rem;
        }

        .btn-outline-pill {
            background: transparent;
            border: 2px solid #e2e8f0;
            color: #64748b;
        }

        .footer-note {
            font-size: 0.75rem;
            color: #94a3b8;
            margin-top: 1rem;
        }
    </style>
</head>

<body>

    <!-- Splash Content -->
    <div class="splash-content" id="splash">
        <div class="logo-text">Whispr</div>
        <div class="tagline">Speak freely. Heal together.</div>
    </div>

    <!-- Slider Card -->
    <div class="slider-card" id="sliderCard">

        <!-- Slide 1: Journaling -->
        <div class="slide active" id="slide-1">
            <div class="icon-container icon-teal">
                <i class="bi bi-journal-richtext"></i>
            </div>
            <h2 class="card-headline">Journal your emotions safely</h2>
            <p class="card-body-text">
                Your private digital sanctuary. Use AI-powered journaling to reflect without fear.
            </p>
        </div>

        <!-- Slide 2: Community -->
        <div class="slide" id="slide-2">
            <div class="icon-container icon-warm">
                <i class="bi bi-chat-heart-fill"></i>
            </div>
            <h2 class="card-headline">Express yourself freely</h2>
            <p class="card-body-text">
                Join a judgment-free space where your thoughts are heard, valued, and anonymous.
            </p>
        </div>

        <!-- Slide 3: Auth Selection -->
        <div class="slide" id="slide-3">
            <div class="icon-container" style="color: #CDB4DB;">
                <i class="bi bi-stars"></i>
            </div>
            <h2 class="card-headline">Start your journey</h2>

            <div style="width: 100%; margin-top: 1rem;">
                <!-- Google Button -->
                <a href="{{ route('auth.google') }}" class="btn-action btn-google">
                    <i class="bi bi-google"></i> Continue with Google
                </a>

                <!-- Email Sign Up -->
                <a href="{{ route('register') }}" class="btn-action btn-outline-pill">
                    Sign Up with Email
                </a>

                <div class="mt-3">
                    <span style="color: #94a3b8; font-size: 0.9rem;">Already have an account?</span>
                    <a href="{{ route('login') }}"
                        style="color: #64748b; font-weight: 600; text-decoration: none; margin-left: 5px;">Log In</a>
                </div>

                <p class="footer-note">By continuing, you agree to our <a href="{{ route('terms') }}"
                        class="text-decoration-none text-muted fw-semibold">Terms</a> and <a
                        href="{{ route('privacy') }}" class="text-decoration-none text-muted fw-semibold">Privacy
                        Policy</a>.</p>
            </div>
        </div>

        <!-- Navigation (Hidden on last slide) -->
        <div id="navControls">
            <div class="dots-container">
                <div class="dot active" id="dot-1"></div>
                <div class="dot" id="dot-2"></div>
                <div class="dot" id="dot-3"></div>
            </div>
            <button class="btn-action btn-primary-pill" id="nextBtn" onclick="nextSlide()">
                Next
            </button>
        </div>

    </div>

    <script>
        // Splash Timing
        setTimeout(() => {
            const splash = document.getElementById('splash');
            const slider = document.getElementById('sliderCard');

            splash.classList.add('minimized');
            slider.classList.add('visible');
        }, 2500);

        let currentSlide = 1;
        const totalSlides = 3;

        function nextSlide() {
            if (currentSlide < totalSlides) {
                // Determine next slide index
                let nextIndex = currentSlide + 1;

                // Update UI for Auth Slide specifically
                if (nextIndex === totalSlides) {
                    document.getElementById('navControls').style.display = 'none';
                    // We don't hide the card, just show the auth content
                }

                // Transition Slides
                document.getElementById(`slide-${currentSlide}`).classList.remove('active');
                document.getElementById(`dot-${currentSlide}`).classList.remove('active');

                document.getElementById(`slide-${nextIndex}`).classList.add('active');
                document.getElementById(`dot-${nextIndex}`).classList.add('active');

                currentSlide = nextIndex;

                // Change "Next" to "Get Started" on penultimate slide if we wanted, 
                // but requirements say Slide 2 next changes to "Get Started" which effectively leads to Auth
                // Logic handled by just showing the 3rd slide which has the buttons.
            }
        }
    </script>
</body>

</html>