<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function donate()
    {
        // Redundant since we use JS SDK on profile, but kept for route safety
        return redirect()->route('profile');
    }

    public function success(Request $request)
    {
        return view('support.donate_success');
    }

    public function cancel()
    {
        return view('support.donate_cancel');
    }
}
