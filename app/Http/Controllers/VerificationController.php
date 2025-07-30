<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * Class VerificationController
 * @package App\Http\Controllers
 *
 * This controller handles the verification of email addresses.
 * It uses Laravel's built-in `VerifiesEmails` trait to provide
 * the necessary functionality for email verification.
 */
class VerificationController extends Controller
{
    // Use the AuthorizesRequests trait for authorization checks.
    use AuthorizesRequests;
    // Use the VerifiesEmails trait to handle email verification logic.
    use VerifiesEmails;

    /**
     * Where to redirect users after successful email verification.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * Applies middleware to protect routes related to email verification.
     * 'auth' middleware ensures only authenticated users can access.
     * 'signed' middleware ensures the verification link is signed and hasn't been tampered with.
     * 'throttle:6,1' middleware limits verification attempts to 6 per minute.
     *
     * @return void
     */
    public function __construct()
    {
        // Apply the 'auth' middleware to all methods in this controller.
        $this->middleware('auth');

        // Apply the 'signed' middleware only to the 'verify' method.
        // This ensures the verification URL is signed and valid.
        $this->middleware('signed')->only('verify');

        // Apply the 'throttle' middleware to 'verify' and 'resend' methods.
        // This prevents brute-force attacks on verification and resend requests.
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * Show the email verification notice.
     *
     * If the user has already verified their email, they are redirected to the home page.
     * Otherwise, the 'auth.verify' view is displayed, prompting them to verify.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        // Check if the authenticated user has already verified their email.
        return $request->user()->hasVerifiedEmail()
                        // If verified, redirect to the specified redirect path.
                        ? redirect($this->redirectPath())
                        // If not verified, show the email verification notice view.
                        : view('auth.verify');
    }

    /**
     * The user has been successfully verified.
     *
     * This method is called after a user's email has been successfully verified.
     * It redirects the user to the specified path and flashes a success message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function verified(Request $request)
    {
        // Redirect the user to the specified path after successful verification.
        // A success message is flashed to the session for display on the next request.
        return redirect($this->redirectPath())
            ->with('success', 'Your email has been verified successfully!');
    }
}
