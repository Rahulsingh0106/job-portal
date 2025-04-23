<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AuthBaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends AuthBaseController
{
    protected string $guard = 'web';
    protected string $redirectTo = 'dashboard';

    public function create(Request $request): Response
    {
        return Inertia::render('auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => $request->session()->get('status'),
            'submitUrl' => 'login',
            'redirectUrl' => 'register'
        ]);
    }
}
