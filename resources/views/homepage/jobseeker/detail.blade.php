@extends('homepage.layouts.main')
@section('container')
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url('/homepage_assets/images/hero_1.jpg');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Detail Job Seeker</h1>
                    <div class="custom-breadcrumbs">
                        <a href="/">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><a href="/jobseeker">JobSeeker</a></span> <span
                            class="mx-2 slash">/</span><span
                            class="text-white"><strong>{{ $jobseeker->user->name }}</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center" data-aos="fade">
                    <h2 class="section-title mb-3">Detail</h2>
                </div>
            </div>

            <div class="row align-items-center block__69944">
                <div class="col-md-6">
                    <img class="profile-user-img img-fluid img-circle"
                        @if ($jobseeker->image) src="{{ asset('storage/' . $jobseeker->image) }}"
                    @else
                        src="/admin_assets/dist/img/profile/default.png" @endif
                        alt="{{ $jobseeker->user->name }}" class="img-fluid mb-4 rounded">
                </div>

                <div class="col-md-6">
                    <h3>{{ $jobseeker->user->name }}</h3>

                    <ul class="list-unstyled">
                        <li><strong>Phone:</strong> {{ $jobseeker->phone ?? '-' }}</li>
                        <li><strong>Address:</strong> {{ $jobseeker->address ?? '-' }}</li>
                        <li><strong>Graduation Year:</strong> {{ $jobseeker->graduation_year ?? '-' }}</li>
                        <li><strong>Work Experience (Years):</strong> {{ $jobseeker->work_experience_years ?? '-' }}</li>
                        <li>
                            <strong>Resume:</strong>
                            @if ($jobseeker->resume)
                                <a href="{{ asset('storage/' . $jobseeker->resume) }}" target="_blank" rel="noopener">
                                    View Resume
                                </a>
                            @else
                                <span>-</span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row align-items-center block__69944 mt-3">
                <div class="col-md-12" style="text-align: justify">
                    <h3>Bio</h3>
                    <p>{!! $jobseeker->bio !!}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
