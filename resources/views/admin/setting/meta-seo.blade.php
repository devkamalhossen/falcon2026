@extends('admin.layouts.master')
@section('title', 'Meta SEO')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Meta SEO</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Meta SEO Setting</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Change Password Form -->
                            <form action="{{ route('setting.general.meta.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="cols-12">
                                        <label for="meta_title" class=" col-form-label">Meta Title</label>
                                        <div class="">
                                            <input name="meta_title" type="text" value="{{ get_option('meta_title') }}"
                                                class="form-control" id="meta_title">
                                        </div>


                                        <label for="ct" class="col-form-label">Meta Description</label>
                                        <div class="">
                                            <textarea name="meta_description" rows="4" class="form-control" id="ct">{{ get_option('meta_description') }}</textarea>
                                        </div>

                                        <label for="ct" class=" col-form-label">Meta Keywords</label>
                                        <textarea name="meta_keywords" rows="4" class="form-control" id="ct">{{ get_option('meta_keywords') }}</textarea>

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
