@extends('homepage.layouts.main')
@section('container')
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
