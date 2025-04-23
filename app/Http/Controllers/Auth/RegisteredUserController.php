<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AuthBaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends AuthBaseController
{
    protected string $guard = 'web';
    protected string $redirectTo = 'dashboard';
    protected string $model = 'User';

    public function create(): Response
    {
        return Inertia::render('auth/Register', [
            'submitUrl' => 'employer.register',
            'redirectUrl' => 'employer.login'
        ]);
    }
}
