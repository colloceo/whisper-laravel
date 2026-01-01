<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnboardingController extends Controller
{
    public function show()
    {
        return view('onboarding.index');
    }

    public function accept()
    {
        auth()->user()->update(['guidelines_accepted_at' => now()]);
        return redirect()->route('home');
    }
}
