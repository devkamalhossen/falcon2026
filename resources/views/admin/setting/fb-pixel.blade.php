@extends('admin.layouts.master')
@section('title', 'FB Pixel Setup')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>FB Pixel</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">FB Pixel Setting</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Change Password Form -->
                            <form action="{{ route('setting.general.fb.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="cols-12">
                                        <label for="fb_pixel_meta_tags" class=" col-form-label">Tags</label>
                                        <div class="">
                                            <textarea rows="6" name="fb_pixel_meta_tags" type="text" class="form-control" id="fb_pixel_meta_tags">{{ get_option('fb_pixel_meta_tags') }}</textarea>
                                        </div>


                                        <label for="ct" class="col-form-label">Scripts</label>
                                        <div class="">
                                            <textarea name="fb_pixel_scripts" rows="12" class="form-control" id="ct">{{ get_option('fb_pixel_scripts') }}</textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-4">
                                    <div class="cols-12">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
