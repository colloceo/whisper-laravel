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
        Route::post('/mood/update-daily', [App\Http\Controllers\HomeController::class, 'updateDailyMood'])->name('mood.update_daily');
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

        // Admin Routes
        Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
            Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');

            // Users
            Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('users');
            Route::post('/users/{user}/toggle-role', [App\Http\Controllers\AdminController::class, 'toggleAdmin'])->name('users.toggle');
            Route::delete('/users/{user}', [App\Http\Controllers\AdminController::class, 'deleteUser'])->name('users.delete');

            // Chat Rooms
            Route::get('/chat-rooms', [App\Http\Controllers\AdminController::class, 'chatRooms'])->name('chat_rooms');
            Route::post('/chat-rooms', [App\Http\Controllers\AdminController::class, 'storeChatRoom'])->name('chat_rooms.store');
            Route::get('/chat-rooms/{room}/edit', [App\Http\Controllers\AdminController::class, 'editChatRoom'])->name('chat_rooms.edit');
            Route::put('/chat-rooms/{room}', [App\Http\Controllers\AdminController::class, 'updateChatRoom'])->name('chat_rooms.update');
            Route::delete('/chat-rooms/{room}', [App\Http\Controllers\AdminController::class, 'deleteChatRoom'])->name('chat_rooms.delete');

            // Crisis Resources
            Route::get('/resources', [App\Http\Controllers\AdminController::class, 'resources'])->name('resources');
            Route::post('/resources', [App\Http\Controllers\AdminController::class, 'storeResource'])->name('resources.store');
            Route::get('/resources/{resource}/edit', [App\Http\Controllers\AdminController::class, 'editResource'])->name('resources.edit');
            Route::put('/resources/{resource}', [App\Http\Controllers\AdminController::class, 'updateResource'])->name('resources.update');
            Route::delete('/resources/{resource}', [App\Http\Controllers\AdminController::class, 'deleteResource'])->name('resources.delete');

            // Reports
            Route::get('/reports', [App\Http\Controllers\AdminController::class, 'reports'])->name('reports');
            Route::patch('/reports/{id}/dismiss', [App\Http\Controllers\AdminController::class, 'dismissReport'])->name('reports.dismiss');
            Route::delete('/reports/{id}/delete-message', [App\Http\Controllers\AdminController::class, 'deleteReportedMessage'])->name('reports.delete_message');
        });
    });
});
