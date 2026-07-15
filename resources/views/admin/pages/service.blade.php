@extends('admin.layouts.master')
@section('title', 'Service Page')
@section('styles')
    <style>
        .dropdown-menu li a {
            display: flex;
            align-items: center;
            padding: 5px !important;
        }
    </style>
@endsection
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Service Page</h1>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Services</li>
                        <li class="breadcrumb-item active">Service Page Content</li>
                    </ol>
                </nav>
            </div>
        </div>

        <section class="section">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <form class="row g-2" action="{{ route('page.service.update', $pageData?->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                               
                                <div class="col-12">
                                    <label for="section_title" class="form-label">Section Title</label>
                                    <input type="text" name="section_title" placeholder="Title"
                                        class="form-control @error('section_title') is-invalid @enderror" id="section_title"
                                        value="{{ $pageData?->section_title }}">
                                    @error('section_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="section_description" class="form-label">Section Description</label>
                                    <textarea name="section_description" placeholder="Section Description" rows="5"
                                        class="form-control @error('section_description') is-invalid @enderror" id="section_description">{{ $pageData?->section_description }}</textarea>
                                    @error('section_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <hr>
                                <div class="col-12 col-lg-12 col-md-12">
                                    <label for="meta_title" class="form-label">Meta Title</label>
                                    <input type="text" name="meta_title" placeholder="Meta Title"
                                        class="form-control @error('meta_title') is-invalid @enderror" id="meta_title"
                                        value="{{ $pageData?->meta_title }}">
                                    @error('meta_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <label for="meta_description" class="form-label">Meta Description</label>
                                    <textarea name="meta_description" placeholder="Meta Description" rows="4"
                                        class="form-control @error('meta_description') is-invalid @enderror" id="meta_description">{{ $pageData?->meta_description }}</textarea>
                                    @error('meta_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                    <textarea name="meta_keywords" placeholder="Meta keywords" rows="4"
                                        class="form-control @error('meta_keywords') is-invalid @enderror" id="meta_keywords">{{ $pageData?->meta_keywords }}</textarea>
                                    @error('meta_keywords')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="text-end">
                                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                </div>
                            </form><!-- Vertical Form -->

                        </div>

                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection