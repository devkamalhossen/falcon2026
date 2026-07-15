@extends('admin.layouts.master')
@section('title', 'Contact Page')
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
            <h1>Contact Page</h1>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Contact</li>
                        <li class="breadcrumb-item active">Contact Page Content</li>
                    </ol>
                </nav>
            </div>
        </div>

        <section class="section">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <form class="row g-2" action="{{ route('page.contact.update', $pageData?->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="col-12 p-2 text-center">
                                    <div>
                                        <img id="profileImage"
                                            src="{{ asset($pageData?->image ? $pageData?->image : 'admin/assets/img/1920X1080.svg') }}"
                                            alt="Client Iimage" width="30%">
                                        <div class="pt-2">
                                            <!-- Hidden File Input -->
                                            <input type="file" name="image" id="profileImageInput"
                                                style="display: none;">

                                            <!-- Upload Button -->
                                            <a href="#" class="btn btn-primary btn-sm" title="Upload image"
                                                id="uploadImageButton">
                                                <i class="bi bi-upload"></i>
                                            </a>

                                            <!-- Remove Button -->
                                            <a href="#" class="btn btn-danger btn-sm" title="Remove image"
                                                id="removeImageButton">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" placeholder="Title"
                                        class="form-control @error('title') is-invalid @enderror" id="title"
                                        value="{{ $pageData?->title }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                               
                               
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


@section('scripts')
    <script>
        // Handle Upload Button Click
        document.getElementById('uploadImageButton').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('profileImageInput').click();
        });

        // Handle Image File Selection
        document.getElementById('profileImageInput').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profileImage').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(file);
            }
        });

        // Handle Remove Button Click
        document.getElementById('removeImageButton').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('profileImage').setAttribute('src',
                '{{ asset('admin/assets/img/1920X1080.svg') }}');
        });
    </script>
@endsection
