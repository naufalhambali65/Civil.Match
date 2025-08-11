@extends('homepage.layouts.main')
@section('container')
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url('/homepage_assets/images/hero_1.jpg');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Job Seeker</h1>
                    <div class="custom-breadcrumbs">
                        <a href="/">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>JobSeeker</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="site-section">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2">{{ $numberJobSeeker }} Job Seeker</h2>
                </div>
            </div>

            <form method="GET" action="/jobseeker" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                        placeholder="Search job seeker...">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
            <ul class="job-listings mb-5">
                <!-- Search Form -->
                @foreach ($jobSeekers as $jobSeeker)
                    <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                        <a href="jobseeker/{{ $jobSeeker->id }}"></a>
                        <div class="job-listing-logo">
                            @if ($jobSeeker->image)
                                <img src="{{ asset('storage/' . $jobSeeker->image) }}" alt="{{ $jobSeeker->user->name }}"
                                    class="img-fluid">
                            @else
                                <img src="/admin_assets/dist/img/profile/default.png" alt="{{ $jobSeeker->user->name }}">>
                            @endif
                        </div>

                        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                <h2>{{ $jobSeeker->user->name }}</h2>
                            </div>
                            <div class="job-listing-meta">
                                <span class="icon-phone"></span>
                                {{ $jobSeeker->phone }}
                            </div>
                            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                <span class="icon-room"></span> {{ $jobSeeker->address }}

                            </div>
                        </div>

                    </li>
                @endforeach
            </ul>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $jobSeekers->links() }}
            </div>

            {{-- <div class="row pagination-wrap">
                <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
                    <span>Showing 1-7 Of 43,167 Jobs</span>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="custom-pagination ml-auto">
                        <a href="#" class="prev">Prev</a>
                        <div class="d-inline-block">
                            <a href="#" class="active">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                        </div>
                        <a href="#" class="next">Next</a>
                    </div>
                </div>
            </div> --}}

        </div>
    </section>
    <section class="py-5 bg-image overlay-primary fixed overlay"
        style="background-image: url('/homepage_assets/images/hero_1.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="text-white">Looking for Your Next Opportunity?</h2>
                    <p class="mb-0 text-white lead">Find the job that matches your skills and passion — start your journey
                        today.</p>
                </div>
                <div class="col-md-3 ml-auto">
                    <a href="/login" class="btn btn-warning btn-block btn-lg">Sign Up</a>
                </div>
            </div>
        </div>
    </section>
@endsection
