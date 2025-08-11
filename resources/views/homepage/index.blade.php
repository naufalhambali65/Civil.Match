@extends('homepage.layouts.main')
@section('container')
    <!-- HOME -->
    <section class="home-section section-hero overlay bg-image"
        style="background-image: url('/homepage_assets/images/hero_1.jpg');" id="home-section">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="mb-5 text-center">
                        <h1 class="text-white font-weight-bold">Your Career Journey Starts Here</h1>
                        <p>Discover jobs that match your passion and skills. Apply now and take the leap.</p>
                    </div>
                </div>
            </div>
        </div>

        <a href="#next" class="scroll-button smoothscroll">
            <span class=" icon-keyboard_arrow_down"></span>
        </a>

    </section>

    <section class="py-5 bg-image overlay-primary fixed overlay" id="next"
        style="background-image: url('/homepage_assets/images/hero_1.jpg');">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2 text-white">CIVIL.MATCH Site Stats</h2>
                </div>
            </div>
            <div class="row justify-content-center pb-0 block__19738 section-counter">

                <!-- Job Seekers -->
                <div class="col-6 col-md-4 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <strong class="number" data-number="{{ $numberAllJobSeeker }}">0</strong>
                    </div>
                    <span class="caption d-block text-center">Job Seekers</span>
                </div>

                <!-- Jobs Posted -->
                <div class="col-6 col-md-4 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <strong class="number" data-number="{{ $numberAllPosts }}">0</strong>
                    </div>
                    <span class="caption d-block text-center">Jobs Posted</span>
                </div>

                <!-- Companies -->
                <div class="col-6 col-md-4 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <strong class="number" data-number="{{ $numberCompanies }}">0</strong>
                    </div>
                    <span class="caption d-block text-center">Companies</span>
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

            <form method="GET" action="/" class="mb-4">
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

    <section class="site-section">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2">{{ $numberPosts }} Job List</h2>
                </div>
            </div>

            <form method="GET" action="/" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search-job" value="{{ request('search-job') }}" class="form-control"
                        placeholder="Search Job...">
                    <button class="btn btn-primary" type="submit">Search Job</button>
                </div>
            </form>
            <ul class="job-listings mb-5">
                <!-- Search Form -->
                @foreach ($posts as $post)
                    <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                        <a href="joblist/{{ $post->slug }}"></a>
                        <div class="job-listing-logo">
                            @if ($post->company->image)
                                <img src="{{ asset('storage/' . $post->company->image) }}" alt="{{ $post->author->name }}"
                                    class="img-fluid">
                            @else
                                <img src="/admin_assets/dist/img/profile/default.png" alt="{{ $post->author->name }}">>
                            @endif
                        </div>
                        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                <h2>{{ $post->title }}</h2>
                                <strong>{{ $post->author->name }}</strong>
                            </div>
                            <div class="job-listing-meta">
                                @if ($post->job_status == 'part-time')
                                    <span class="badge badge-danger">Part Time</span>
                                @elseif($post->job_status == 'full-time')
                                    <span class="badge badge-success">Full Time</span>
                                @endif
                            </div>
                        </div>

                    </li>
                @endforeach
            </ul>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $posts->links() }}
            </div>

        </div>
    </section>
@endsection
