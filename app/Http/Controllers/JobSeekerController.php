<?php

namespace App\Http\Controllers;

use App\Models\JobSeeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobSeekerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Profile Page';
        $user = Auth::user();
        $data = JobSeeker::where('user_id', $user->id)->first();
        return view('admin.jobseeker.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JobSeeker $jobseeker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobSeeker $jobseeker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobSeeker $jobseeker)
    {
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'graduation_year' => 'nullable|digits:4|integer|min:1900|max:' . now()->year,
            'bio' => 'nullable|string|max:1000',
            'resume' => 'nullable|file|mimes:pdf|max:2048',
            'phone' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'work_experience_years' => 'nullable|integer|min:0|max:50',
        ]);

        if ($request->file('image')) {
            if ($request->oldimage) {
                Storage::disk('public')->delete($request->oldimage);
            }
            $validatedData['image'] = $request->file('image')->store('jobseeker-image', 'public');
        }
        if ($request->file('resume')) {
            if ($request->oldresume) {
                Storage::disk('public')->delete($request->oldresume);
            }
            $validatedData['resume'] = $request->file('resume')->store('jobseeker-resume', 'public');
        }

        JobSeeker::where('id', $jobseeker->id)->update($validatedData);

        return redirect('/admin/jobseeker')->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobSeeker $jobseeker)
    {
        //
    }

    public function updateStatus(Request $request, JobSeeker $jobseeker)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:active,nonactive',
        ]);

        JobSeeker::where('id', $jobseeker->id)->update($validatedData);

        return redirect('/admin/jobseeker')->with('success', 'Status updated successfully.');
    }
}