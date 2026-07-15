@extends('admin.layouts.app')
@section('title', 'Login')
@section('main')
    @php
        $logo = get_option('site_logo');
    @endphp
    <main>
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            @if ($logo)
                                <div class="d-flex justify-content-center py-4">
                                    <a href="#" class="logo d-flex align-items-center w-auto">
                                        <img src="{{ asset($logo) }}" alt="logo" class="img-fluid" width="100">
                                    </a>
                                </div>
                            @endif
                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center small">Enter your email & password to login</p>
                                        @if (session()->has('error'))
                                            <div class="alert alert-danger">{{ session()->get('error') }}</div>
                                        @endif
                                        @if (session()->has('message'))
                                            <div class="alert alert-success">{{ session()->get('message') }}</div>
                                        @endif
                                    </div>

                                    <form class="row g-3" action="{{ route('admin.login') }}" method="POST">
                                        @csrf

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Email</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" name="email" value="{{ old('email') }}"
                                                    class="form-control  @error('email') is-invalid @enderror" required>
                                                <div class="invalid-feedback">Please enter your email.</div>
                                            </div>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password"
                                                class="form-control  @error('password') is-invalid @enderror"
                                                autocomplete="current-password" required>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                      
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>
                                    </form>
                                    <br>
                                    @if (Route::has('admin.forgot.password'))
                                        <a class="text-primary fw-medium text-center d-block"
                                            href="{{ route('admin.forgot.password') }}">Forgot Password?</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main>
@endsection
