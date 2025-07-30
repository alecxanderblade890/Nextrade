<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\EmailVerificationRequest; // Important for verify method
use Illuminate\Support\Facades\Auth; // For Auth::user()
use Illuminate\Support\Facades\Log; // For debugging

class VerificationController extends Controller
{
    use AuthorizesRequests;
    // The VerifiesEmails trait is designed to *also* register routes.
    // If you are manually registering routes, you might not *need* the trait itself
    // if you copy its methods. Let's *not* use it here to avoid implicit magic.
    // For simplicity, let's write out the methods.

    // If you are using the trait, you often don't override these methods like this.
    // For the manual routes, you MUST have these public methods.

    protected $redirectTo = '/home'; // This is still a good convention for post-verification redirect

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function show(Request $request)
    {
        // The logic you already had for showing the view or redirecting if already verified.
        return $request->user()->hasVerifiedEmail()
                            ? redirect($this->redirectTo) // Use $this->redirectTo
                            : view('auth.verify'); // Your verify.blade.php
    }

    // You MUST have this method because you route to it:
    public function verify(EmailVerificationRequest $request)
    {
        try {
            if ($request->user()->hasVerifiedEmail()) {
                return redirect($this->redirectTo)->with('status', 'Your email is already verified.');
            }

            if ($request->user()->markEmailAsVerified()) {
                event(new \Illuminate\Auth\Events\Verified($request->user()));
            }

            return redirect($this->redirectTo)
                ->with('status', 'Thank you for verifying your email!');
                
        } catch (\Exception $e) {
            \Log::error('Email verification failed: ' . $e->getMessage());
            return redirect()->route('verification.notice')
                ->with('error', 'Email verification failed. Please try again.');
        }
    }

    // You MUST have this method because you route to it:
    public function resend(Request $request)
    {
        // This is the core logic from the VerifiesEmails trait
        if ($request->user()->hasVerifiedEmail()) {
            return redirect($this->redirectTo);
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}