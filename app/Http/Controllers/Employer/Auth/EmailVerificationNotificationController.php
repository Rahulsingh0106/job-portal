<?php

namespace App\Http\Controllers\Employer\Auth;

use App\Http\Controllers\AuthBaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends AuthBaseController
{
    protected string $guard = 'employer';
    protected string $redirectTo = 'employer/dashboard';

    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
