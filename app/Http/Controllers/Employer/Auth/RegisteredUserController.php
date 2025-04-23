<?php

namespace App\Http\Controllers\Employer\Auth;

use App\Http\Controllers\AuthBaseController;
use App\Http\Controllers\Controller;
use App\Models\Employer;
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
    protected string $guard = 'employer';
    protected string $redirectTo = 'employer.dashboard';
    protected string $model = Employer::class;
    protected string $role = 'employer';
    public function create(): Response
    {
        return Inertia::render('auth/Register', [
            'submitUrl' => 'employer.register',
            'redirectUrl' => 'employer.login'
        ]);
    }
}
