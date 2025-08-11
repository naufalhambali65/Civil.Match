@extends('homepage.layouts.main')
@section('container')
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url('/homepage_assets/images/hero_1.jpg');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Sign Up/Login</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Log In</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5">
                    <h2 class="mb-4">Sign Up To JobBoard</h2>
                    <form action="/register" method="post" class="p-4 border rounded">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="email">Email</label>
                                <input type="text" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Email address"
                                    required value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="name">Name</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Full Name"
                                    required value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="user_role">Sign up As</label>
                                <select class="form-control" id="user_role" name="user_role" aria-label="Sign Up As"
                                    required>
                                    <option value="company">
                                        Company
                                    </option>
                                    <option value="jobseeker">
                                        Job Seeker
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="password">Password</label>
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                    required value="{{ old('password') }}">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group mb-4">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="confirm-password">Re-Type Password</label>
                                <input type="password" id="confirm-password" name="confirm-password"
                                    class="form-control @error('confirm-password') is-invalid @enderror"
                                    placeholder="Re-type Password" required value="{{ old('confirm-password') }}">
                                @error('confirm-password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Sign Up" class="btn px-4 btn-primary text-white">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-lg-6">
                    <h2 class="mb-4">Log In To JobBoard</h2>
                    <form action="/login" method="post" class="p-4 border rounded">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="login-email">Email</label>
                                <input type="text" id="login-email"
                                    class="form-control @error('login-email') is-invalid @enderror" name="login-email"
                                    placeholder="Email address">
                                @error('login-email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group mb-4">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="login-password">Password</label>
                                <input type="password" id="login-password" class="form-control" name="login-password"
                                    placeholder="Password">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Log In" class="btn px-4 btn-primary text-white">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
