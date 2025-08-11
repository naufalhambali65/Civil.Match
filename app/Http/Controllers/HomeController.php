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
        $queryJob = Post::with('company', 'author')->where('status', 'public');

        if ($request->has('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($uq) use ($search) {
                    $uq->where('name', 'like', '%' . $search . '%');
                })
                    ->orWhere('address', 'like', '%' . $search . '%');
            });
        }

        if ($request->has('search-job')) {
            $searchJob = $request->input('search-job');

            $queryJob->where(function ($q) use ($searchJob) {
                $q->whereHas('author', function ($uq) use ($searchJob) {
                    $uq->where('name', 'like', '%' . $searchJob . '%');
                })
                    ->orWhere('job_status', 'like', '%' . $searchJob . '%')
                    ->orWhere('title', 'like', '%' . $searchJob . '%');
            });
        }

        $jobSeekers = $query->latest()->paginate(10);
        $jobSeekers->appends($request->only('search'));
        $numberJobSeeker = $jobSeekers->count();
        $numberAllJobSeeker = JobSeeker::all()->count();


        $posts = $queryJob->latest()->paginate(10);
        $posts->appends($request->only('search-job'));
        $numberPosts = $posts->count();
        $numberAllPosts = Post::all()->count();

        $companies = Company::all();
        $numberCompanies = $companies->count();

        return view('homepage.index', compact(
            'jobSeekers',
            'numberJobSeeker',
            'numberAllJobSeeker',
            'companies',
            'numberCompanies',
            'posts',
            'numberPosts',
            'numberAllPosts'
        ));
    }

    public function jobseekerDetail(JobSeeker $jobseeker)
    {
        return view('homepage.jobseeker.detail', compact('jobseeker'));
    }

    public function jobSeeker(Request $request)
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

        return view('homepage.jobseeker.index', compact(
            'numberJobSeeker',
            'jobSeekers',
        ));
    }

    public function joblist(Request $request)
    {
        $queryJob = Post::with('company', 'author')->where('status', 'public');

        if ($request->has('search-job')) {
            $searchJob = $request->input('search-job');

            $queryJob->where(function ($q) use ($searchJob) {
                $q->whereHas('author', function ($uq) use ($searchJob) {
                    $uq->where('name', 'like', '%' . $searchJob . '%');
                })
                    ->orWhere('job_status', 'like', '%' . $searchJob . '%')
                    ->orWhere('title', 'like', '%' . $searchJob . '%');
            });
        }

        $posts = $queryJob->latest()->paginate(10);
        $posts->appends($request->only('search-job'));
        $numberPosts = $posts->count();
        $numberAllPosts = Post::all()->count();

        return view('homepage.joblist.index', compact(
            'numberPosts',
            'numberAllPosts',
            'posts'
        ));
    }

    public function joblistDetail(Post $joblist)
    {
        return view('homepage.joblist.detail', compact('joblist'));
    }
}
