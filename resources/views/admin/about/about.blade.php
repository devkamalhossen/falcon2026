@extends('admin.layouts.master')
@section('title', 'About Content')
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
            <h1>About Content</h1>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">About Content</li>
                        <li class="breadcrumb-item active">About Content Content</li>
                    </ol>
                </nav>
            </div>
        </div>

        <section class="section">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <form class="row g-2" action="{{ route('about.content.update', $pageData?->id) }}" method="POST"
                                enctype="multipart/form-data" id="aboutContentForm">
                                @csrf
                                @method('PUT')
                                <div class="col-4 p-2 text-center">
                                    <div>
                                        <img id="profileImage"
                                            src="{{ asset($pageData?->image ? $pageData?->image : 'admin/assets/img/600X900.svg') }}"
                                            alt="Client Iimage" width="60%">
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

                                <div class="col-8">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" placeholder="Title"
                                        class="form-control @error('title') is-invalid @enderror" id="title"
                                        value="{{ $pageData?->title }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                               
                                    <label for="description" class="form-label">Description</label>
                                    <div class="card-body" style="height: 400px;padding-top: 20px;margin-bottom: 40px;">
                                <div class="quill-editor-about-content-full">{!!$pageData?->description!!}</div>
                                <input type="hidden" name="description" id="description" value="{{old('description')}}" />
                            </div>
                                    {{-- <textarea name="description" placeholder="Section Description" rows="15"
                                        class="form-control @error('description') is-invalid @enderror" id="description">{{ $pageData?->description }}</textarea> --}}
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

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
                '{{ asset('admin/assets/img/600X900.svg') }}');
        });
    </script>
@endsection
