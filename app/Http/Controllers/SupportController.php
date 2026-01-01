<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Display the Help Center page.
     */
    public function help()
    {
        return view('support.help');
    }

    /**
     * Display the Contact Support page.
     */
    public function contact()
    {
        return view('support.contact');
    }

    /**
     * Handle support message submission.
     */
    public function submitContact(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // In a real app, we would send an email or store this in the database.
        // For now, we'll just redirect back with a success message.

        return back()->with('success', 'Your message has been received. We usually respond within 24-48 hours.');
    }
}
