<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/auth/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

Route::middleware('auth')->group(function () {
    Route::get('/onboarding/guidelines', [App\Http\Controllers\OnboardingController::class, 'show'])->name('onboarding.guidelines');
    Route::post('/onboarding/guidelines', [App\Http\Controllers\OnboardingController::class, 'accept'])->name('onboarding.accept');

    Route::middleware('guidelines')->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::post('/mood', [App\Http\Controllers\HomeController::class, 'storeMood'])->name('mood.store');
        Route::get('/journal', function () {
            return view('journal');
        })->name('journal');
        Route::get('/chat', function () {
            return view('chat');
        })->name('chat');
        Route::get('/chat/room/{id}', App\Livewire\ChatRoom::class)->name('chat.room');
        Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
        Route::get('/crisis', function () {
            return view('crisis');
        })->name('crisis');

        // Support Routes
        Route::get('/help', [App\Http\Controllers\SupportController::class, 'help'])->name('support.help');
        Route::get('/contact', [App\Http\Controllers\SupportController::class, 'contact'])->name('support.contact');
        Route::get('/contact', [App\Http\Controllers\SupportController::class, 'contact'])->name('support.contact');
        Route::post('/contact', [App\Http\Controllers\SupportController::class, 'submitContact'])->name('support.submit');
        Route::view('/privacy', 'privacy')->name('privacy'); // Placeholder view
        Route::view('/terms', 'terms')->name('terms'); // Placeholder view
    });
});
