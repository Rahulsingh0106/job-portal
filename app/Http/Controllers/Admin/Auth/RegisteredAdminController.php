<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\AuthBaseController;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredAdminController extends AuthBaseController
{
    protected string $guard = 'admin';
    protected string $redirectTo = 'admin/dashboard';
    protected string $model = 'Admin';
    /**
     * Show the registration page.
     */
    public function create(): Response
    {
        return Inertia::render('admin/auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|lowercase|email|max:255|unique:' . Admin::class,
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //     ]);

    //     $user = Admin::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);
    //     $user->assignRole('admin');
    //     event(new Registered($user));

    //     Auth::guard('admin')->login($user);

    //     return to_route('admin/dashboard');
    // }
}
