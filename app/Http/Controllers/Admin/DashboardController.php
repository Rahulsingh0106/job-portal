<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $jobPosts = JobPost::with('employer.company')->get();
        return Inertia::render('admin/Dashboard', [
            'jobPosts' => $jobPosts,
        ]);
    }

    public function updateJobPostStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Accepted,Rejected',
        ]);

        $post = JobPost::findOrFail($id);
        $post->status = $request->status;
        $post->save();

        return to_route('admin.dashboard');
    }
}
