<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JobSeeker;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = JobSeeker::with('user')->where('status', 'active');

        if ($request->has('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($uq) use ($search) {
                    $uq->where('name', 'like', '%' . $search . '%');
                })
                    ->orWhere('address', 'like', '%' . $search . '%');
            });
        }

        $jobSeekers = $query->latest()->paginate(10);
        $jobSeekers->appends($request->only('search'));


        $numberJobSeeker = $jobSeekers->count();

        $companies = Company::all();
        $numberCompanies = $companies->count();

        $posts = Post::all();
        $numberPosts = $posts->count();

        return view('homepage.index', compact('numberJobSeeker', 'jobSeekers', 'numberCompanies', 'companies', 'numberPosts', 'posts'));
    }

    public function jobseekerDetail(JobSeeker $jobseeker)
    {
        return view('homepage.jobseeker.detail', compact('jobseeker'));
    }
}
