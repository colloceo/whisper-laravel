@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            
            <!-- 1. Header -->
            <div class="d-flex align-items-center justify-content-between mb-4 px-2">
                <div class="d-flex align-items-center">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->anonymous_username }}&background=b2cbf2&color=fff&rounded=true" 
                         alt="Avatar" class="rounded-circle me-3 border border-2 border-white shadow-sm" style="width: 50px; height: 50px;">
                    <div>
                        <h5 class="fw-bold text-dark mb-0">Good {{ now()->format('H') < 12 ? 'Morning' : (now()->format('H') < 18 ? 'Afternoon' : 'Evening') }},</h5>
                        <small class="text-muted">{{ Auth::user()->anonymous_username }}</small>
                    </div>
                </div>
                <!-- Notification Bell -->
                <div class="position-relative p-2 rounded-circle glass-card" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-bell text-secondary"></i>
                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                        <span class="visually-hidden">New alerts</span>
                    </span>
                </div>
            </div>

            <!-- 2. Section A: Hero Card (Affirmation) -->
            <div class="glass-card border-0 mb-4 position-relative overflow-hidden" 
                 style="background: linear-gradient(135deg, rgba(168, 218, 220, 0.2) 0%, rgba(255, 255, 255, 0.6) 100%);">
                <div class="card-body p-4 text-center">
                    <h6 class="text-uppercase fw-bold text-muted small mb-3" style="letter-spacing: 1px;">Daily Affirmation</h6>
                    <blockquote class="mb-0">
                        <p class="fst-italic fw-medium fs-5 text-dark mb-0" style="font-family: 'Poppins', serif;">
                            "{{ $affirmation ?? 'You are stronger than you know.' }}"
                        </p>
                    </blockquote>
                </div>
                <!-- Decorative Circle -->
                <div class="position-absolute top-0 end-0 translate-middle p-5 rounded-circle" style="background: rgba(168, 218, 220, 0.1); width: 100px; height: 100px;"></div>
            </div>

            <!-- 3. Section B: Mood Tracker -->
            <div class="glass-card border-0 mb-4">
                <div class="card-body p-4 text-center">
                    <h6 class="fw-bold text-dark mb-4">How are you feeling right now?</h6>
                    
                    <form method="POST" action="{{ route('mood.store') }}">
                        @csrf
                        <div class="d-flex justify-content-between align-items-center gap-2">
                            @foreach([
                                1 => ['icon' => 'emoji-frown', 'color' => 'text-primary', 'label' => 'Low'],
                                2 => ['icon' => 'emoji-dizzy', 'color' => 'text-secondary', 'label' => 'Okay'],
                                3 => ['icon' => 'emoji-neutral', 'color' => 'text-info', 'label' => 'Fine'],
                                4 => ['icon' => 'emoji-smile', 'color' => 'text-warning', 'label' => 'Good'],
                                5 => ['icon' => 'emoji-heart-eyes', 'color' => 'text-success', 'label' => 'Great']
                            ] as $score => $data)
                                <button type="submit" name="mood_score" value="{{ $score }}" 
                                        class="btn btn-link text-decoration-none p-0 mood-icon-btn transform-scale">
                                    <div class="d-flex flex-column align-items-center">
                                        <i class="bi bi-{{ $data['icon'] }} fs-2 {{ $data['color'] }} mb-1"></i>
                                        <span class="small text-muted" style="font-size: 0.7rem;">{{ $data['label'] }}</span>
                                    </div>
                                </button>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>

            <!-- 4. Section C: Quick Actions Grid -->
            <h6 class="fw-bold text-muted small text-uppercase mb-3 px-1">Quick Actions</h6>
            <div class="row g-3 mb-4">
                <!-- Card 1: Journal -->
                <div class="col-6">
                    <a href="{{ route('journal') }}" class="text-decoration-none">
                        <div class="glass-card border-0 p-3 h-100 d-flex flex-column align-items-center justify-content-center text-center transition-hover">
                            <div class="rounded-circle bg-soft-blue p-3 mb-2 text-primary">
                                <i class="bi bi-journal-richtext fs-4"></i>
                            </div>
                            <span class="fw-bold text-dark small">Journal</span>
                        </div>
                    </a>
                </div>
                
                <!-- Card 2: Community -->
                <div class="col-6">
                    <a href="{{ route('chat') }}" class="text-decoration-none">
                        <div class="glass-card border-0 p-3 h-100 d-flex flex-column align-items-center justify-content-center text-center transition-hover">
                            <div class="rounded-circle bg-soft-purple p-3 mb-2 text-purple">
                                <i class="bi bi-people-fill fs-4"></i>
                            </div>
                            <span class="fw-bold text-dark small">Community</span>
                        </div>
                    </a>
                </div>

                <!-- Card 3: Crisis Support -->
                <div class="col-6">
                    <a href="{{ route('crisis') }}" class="text-decoration-none">
                        <div class="glass-card border-0 p-3 h-100 d-flex flex-column align-items-center justify-content-center text-center transition-hover" 
                             style="border-bottom: 3px solid #ffcdb2;">
                            <div class="rounded-circle bg-soft-warm p-3 mb-2 text-danger">
                                <i class="bi bi-heart-pulse-fill fs-4"></i>
                            </div>
                            <span class="fw-bold text-dark small">Crisis Support</span>
                        </div>
                    </a>
                </div>

                <!-- Card 4: My Progress -->
                <div class="col-6">
                    <a href="{{ route('profile') }}" class="text-decoration-none">
                        <div class="glass-card border-0 p-3 h-100 d-flex flex-column align-items-center justify-content-center text-center transition-hover">
                            <div class="rounded-circle bg-light p-3 mb-2 text-secondary">
                                <i class="bi bi-graph-up fs-4"></i>
                            </div>
                            <span class="fw-bold text-dark small">My Progress</span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- 5. Section D: Weekly Insight (Chart Placeholder) -->
            <div class="glass-card border-0 mb-5">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-bold text-dark mb-0">Weekly Emotional Rhythm</h6>
                        <span class="badge bg-light text-muted rounded-pill">Last 7 Days</span>
                    </div>
                    
                    <div class="chart-container" style="position: relative; height:150px; width:100%">
                        <canvas id="moodChart"></canvas> 
                        <!-- Placeholder visual if JS fails or not implemented yet -->
                        <div class="d-flex align-items-end justify-content-between h-100 w-100 position-absolute top-0 start-0 opacity-25" style="z-index: -1;">
                            <div class="bg-primary rounded-top" style="width: 10%; height: 40%;"></div>
                            <div class="bg-primary rounded-top" style="width: 10%; height: 60%;"></div>
                            <div class="bg-primary rounded-top" style="width: 10%; height: 30%;"></div>
                            <div class="bg-primary rounded-top" style="width: 10%; height: 80%;"></div>
                            <div class="bg-primary rounded-top" style="width: 10%; height: 50%;"></div>
                            <div class="bg-primary rounded-top" style="width: 10%; height: 70%;"></div>
                            <div class="bg-primary rounded-top" style="width: 10%; height: 90%;"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    /* Scoped Styles for Home Dashboard */
    .bg-soft-blue { background-color: #e0f2fe; }
    .bg-soft-purple { background-color: #f3e8ff; }
    .bg-soft-warm { background-color: #fff7ed; }
    
    .text-purple { color: #9333ea; }
    
    .mood-icon-btn { transition: transform 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
    .mood-icon-btn:hover { transform: scale(1.2); }
    .mood-icon-btn:focus { transform: scale(1.2); outline: none; }

    .transition-hover { transition: transform 0.2s ease; }
    .transition-hover:hover { transform: translateY(-5px); }
</style>
@endsection