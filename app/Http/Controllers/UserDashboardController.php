<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobPost;
use App\Models\Resume;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserDashboardController extends Controller
{
    public function index()
    {
        $jobs = JobPost::where('status', 'Accepted')->get();
        $resume = Resume::where('user_id', auth('web')->user()->id)->first();

        return Inertia::render('Dashboard', [
            'jobs' => $jobs,
            'resume' => $resume
        ]);
    }

    public function apply(Request $request, $id)
    {
        $request->validate([
            'resume' => 'nullable|file|mimes:pdf,doc,docx',
        ]);
        if ($request->file('resume')) {
            $path = $request->file('resume')->store('resumes');
            Resume::create([
                'resume_file' => $path,
                'user_id' => auth('web')->user()->id
            ]);
        }
        JobApplication::create([
            'user_id' => auth('web')->user()->id,
            'job_id' => $id
        ]);

        return back()->with('success', 'Job get applied successfully!');
    }
}
