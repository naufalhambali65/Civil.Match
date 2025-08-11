@extends('homepage.layouts.main')
@section('container')
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url('/homepage_assets/images/hero_1.jpg');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Detail Job</h1>
                    <div class="custom-breadcrumbs">
                        <a href="/">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><a href="/joblist">JobList</a></span> <span
                            class="mx-2 slash">/</span><span
                            class="text-white"><strong>{{ $joblist->title }}</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="site-section">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="border p-2 d-inline-block mr-3 rounded">
                            @if ($joblist->company->image)
                                <img src="{{ asset('storage/' . $joblist->company->image) }}"
                                    alt="{{ $joblist->author->name }}" class="img-fluid" style="max-width: 150px">
                            @else
                                <img src="/admin_assets/dist/img/profile/default.png" alt="{{ $joblist->author->name }}">>
                            @endif
                        </div>
                        <div>
                            <h2>{{ $joblist->title }}</h2>
                            <div>
                                <span class="ml-0 mr-2 mb-2"><span
                                        class="icon-briefcase mr-2"></span>{{ $joblist->author->name }}</span>
                                {{-- <span class="m-2"><span class="icon-room mr-2"></span>New York City</span> --}}
                                <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary">
                                        @if ($joblist->job_status == 'part-time')
                                            Part Time
                                        @elseif ($joblist->job_status == 'full-time')
                                            Full Time
                                        @endif
                                    </span></span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4">
                    <div class="row">
                        <div class="col-6">
                            <a href="#" class="btn btn-block btn-light btn-md"><span
                                    class="icon-heart-o mr-2 text-danger"></span>Save Job</a>
                        </div>
                        <div class="col-6">
                            <a href="#" class="btn btn-block btn-primary btn-md">Apply Now</a>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <figure class="mb-5"><img src="{{ asset('storage/' . $joblist->image) }}"
                                alt="{{ $joblist->title }}" class="img-fluid rounded"></figure>
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                class="icon-align-left mr-3"></span>Job Description</h3>
                        {!! $joblist->description !!}
                    </div>
                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                class="icon-rocket mr-3"></span>Requirement</h3>
                        {!! $joblist->requirements !!}
                    </div>

                    {{-- <div class="row mb-5">
                        <div class="col-6">
                            <a href="#" class="btn btn-block btn-light btn-md"><span
                                    class="icon-heart-o mr-2 text-danger"></span>Save Job</a>
                        </div>
                        <div class="col-6">
                            <a href="#" class="btn btn-block btn-primary btn-md">Apply Now</a>
                        </div>
                    </div> --}}

                </div>
                <div class="col-lg-4">
                    <div class="bg-light p-3 border rounded mb-4">
                        <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
                        <ul class="list-unstyled pl-3 mb-0">
                            <li class="mb-2">
                                <strong class="text-black">Published on:</strong>
                                {{ $joblist->created_at->format('F d, Y') }}
                            </li>
                            <li class="mb-2">
                                <strong class="text-black">Employment Status:</strong>
                                {{ $joblist->job_status == 'part-time' ? 'Part Time' : 'Full Time' }}
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
