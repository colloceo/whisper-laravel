<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    // Google Auth Redirect
    public function redirectToGoogle()
    {
        return \Laravel\Socialite\Facades\Socialite::driver('google')->redirect();
    }

    // Google Auth Callback
    public function handleGoogleCallback()
    {
        try {
            $googleUser = \Laravel\Socialite\Facades\Socialite::driver('google')->user();

            $user = \App\Models\User::where('google_id', $googleUser->id)->orWhere('email', $googleUser->email)->first();

            if ($user) {
                // Update Google ID if finding by email
                if (!$user->google_id) {
                    $user->update(['google_id' => $googleUser->id]);
                }
                \Illuminate\Support\Facades\Auth::login($user);
            } else {
                // Create New User
                $user = \App\Models\User::create([
                    'name' => 'Anonymous Member', // Placeholder, Observer sets key name
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => \Illuminate\Support\Facades\Hash::make(\Illuminate\Support\Str::random(16))
                ]);
                \Illuminate\Support\Facades\Auth::login($user);
            }

            return redirect()->intended('/home');

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Google Authentication Failed');
        }
    }
}
