<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobPosts = JobPost::where('employer_id', auth()->user()->id)->get();

        return Inertia::render('employer/job-posts/Index', [
            'jobPosts' => $jobPosts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('employer/job-posts/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required|max:255'
        ]);

        try {
            JobPost::create([
                'title' => $request->title,
                'description' => $request->description,
                'employer_id' => auth()->user()->id,
                'status' => 'Pending'
            ]);
            return to_route('job-posts.index');
        } catch (Exception $th) {
            return to_route('employer.dashboard');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
