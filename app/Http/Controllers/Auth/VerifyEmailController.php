<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return $this->redirectBasedOnRole($request->user());
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return $this->redirectBasedOnRole($request->user());
    }

    private function redirectBasedOnRole($user): RedirectResponse
    {
        if ($user->role === 'client') {
            return redirect()->route('client.dashboard')->with('success', 'Email verified successfully!');
        }

        if ($user->role === 'driver') {
            return redirect()->route('driver.dashboard')->with('success', 'Email verified successfully!');
        }

        return redirect()->route('login')->with('info', 'Email verified. Please log in.');
    }

}
