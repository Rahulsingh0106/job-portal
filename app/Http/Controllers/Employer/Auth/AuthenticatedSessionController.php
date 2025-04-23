<?php

namespace App\Http\Controllers\Employer\Auth;

use App\Http\Controllers\AuthBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends AuthBaseController
{
    protected string $guard = 'employer';
    protected string $redirectTo = 'employer.dashboard';

    public function create(Request $request): Response
    {
        return Inertia::render('auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => $request->session()->get('status'),
            'submitUrl' => 'employer.login',
            'redirectUrl' => 'employer.register'
        ]);
    }
}
