@extends('homepage.layouts.main')
@section('container')
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url('/homepage_assets/images/hero_1.jpg');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Job List</h1>
                    <div class="custom-breadcrumbs">
                        <a href="/">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Job List</strong></span>
                    </div>
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

            <form method="GET" action="/joblist" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search-job" value="{{ request('search-job') }}" class="form-control"
                        placeholder="Search job...">
                    <button class="btn btn-primary" type="submit">Search</button>
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
