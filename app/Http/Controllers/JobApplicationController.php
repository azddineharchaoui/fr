<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new application.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\View\View
     */
    public function create(Job $job)
    {
        // Check if user already applied
        $existingApplication = JobApplication::where('job_id', $job->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($existingApplication) {
            return redirect()->route('jobs.show', $job)
                ->with('error', 'You have already applied for this job.');
        }

        return view('jobs.applications.create', compact('job'));
    }

    /**
     * Store a newly created application in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Job $job)
    {
        $validated = $request->validate([
            'cover_letter' => 'required|string',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Store the resume file
        $resumePath = $request->file('resume')->store('resumes');

        // Create the application
        JobApplication::create([
            'job_id' => $job->id,
            'user_id' => Auth::id(),
            'cover_letter' => $validated['cover_letter'],
            'resume_path' => $resumePath,
            'status' => 'pending',
        ]);

        return redirect()->route('jobs.show', $job)
            ->with('success', 'Your application has been submitted successfully!');
    }

    /**
     * Display a listing of the user's applications.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $applications = Auth::user()->jobApplications()
            ->with('job')
            ->latest()
            ->paginate(10);

        return view('jobs.applications.index', compact('applications'));
    }

    /**
     * Display the specified application.
     *
     * @param  \App\Models\JobApplication  $application
     * @return \Illuminate\View\View
     */
    public function show(JobApplication $application)
    {
        $this->authorize('view', $application);

        return view('jobs.applications.show', compact('application'));
    }
}