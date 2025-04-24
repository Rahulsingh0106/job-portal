<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use Inertia\Inertia;

class UserDashboardController extends Controller
{
    public function index()
    {
        $jobs = JobPost::where('status', 'Accepted')->get();

        return Inertia::render('Dashboard', [
            'jobs' => $jobs
        ]);
    }
}
