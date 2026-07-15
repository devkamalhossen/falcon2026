@extends('admin.layouts.master')
@section('title', 'Project Create')

@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Project Create</h1>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Projects</li>
                        <li class="breadcrumb-item ">Project</li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </nav>
                <a href="{{ route('project.index') }}" class="btn btn-primary btn-sm">Go Back</a>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('project.store') }}" method="POST" id="serviceAreaForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row py-4">
                                    <div class="col-6 col-lg-6 col-md-6">

                                        <div class="mb-2">
                                            <label for="name" class="form-label">Title</label>
                                            <input type="text" name="name" placeholder="Title"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <label for="slug" class="form-label">Slug</label>
                                            <input type="text" name="slug" placeholder="Slug"
                                                class="form-control @error('slug') is-invalid @enderror" id="slug"
                                                value="{{ old('slug') }}">
                                            @error('slug')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <label for="motto" class="form-label">Motto</label>
                                            <input type="text" name="motto" placeholder="Motto"
                                                class="form-control @error('motto') is-invalid @enderror" id="motto"
                                                value="{{ old('motto') }}">
                                            @error('motto')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <label for="video_id" class="form-label">Video ID</label>
                                            <input type="text" name="video_id" placeholder="Youtube Video ID"
                                                class="form-control @error('video_id') is-invalid @enderror" id="video_id"
                                                value="{{ old('video_id') }}">
                                            @error('video_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <label for="service_id" class="form-label">Category</label>
                                            <select name="service_id" id="" class="form-control" required>
                                                <option value="">select service</option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('service_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                        <div class="mb-2">
                                            <label for="is_active" class="form-label">Is Active</label>
                                            <select name="is_active" id="" class="form-control" required>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                            @error('is_active')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <label for="status" class="form-label">Status</label>
                                            <select name="status" id="" class="form-control" required>
                                                <option value="1">Upcoming</option>
                                                <option value="2">Ongoing</option>
                                                <option value="3">Completed</option>
                                            </select>
                                            @error('status')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <label for="is_featured" class="form-label">Is Featured</label>
                                            <select name="is_featured" id="" class="form-control" required>
                                                <option value="1">Featured</option>
                                                <option value="0">Not Featured</option>
                                            </select>
                                            @error('is_featured')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-6 p-2 text-center">
                                        <div>
                                            <img id="profileImage" src="{{ asset('admin/assets/img/1290X730.svg') }}"
                                                alt="Profile" width="50%">
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
                                        <div class="mt-4">
                                            <video id="videoTag" width="400" height="260" controls autoplay></video>
                                             
                                            <div class="pt-2">
                                                <!-- Hidden File Input -->
                                                <input type="file" name="video" id="videoInputTag"
                                                    style="display: none;">

                                                <!-- Upload Button -->
                                                <a href="#" class="btn btn-primary btn-sm" title="Upload Video"
                                                    id="uploadVideoButton">
                                                    <i class="bi bi-upload"></i>
                                                </a>

                                                <!-- Remove Button -->
                                                <a href="#" class="btn btn-danger btn-sm" title="Remove Video"
                                                    id="removeVideoButton">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                            @error('video')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body" style="height: 400px;padding-top: 20px;">
                                <div class="service-area-quill-editor-full" style="border: none;"></div>
                                <input type="hidden" name="description" id="description"
                                    value="{{ old('description') }}" />
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row py-4">

                                    <div class="col-12 col-lg-12 col-md-12">
                                        <div class="mb-2">
                                            <label for="meta_title" class="form-label">Meta Title</label>
                                            <input type="text" name="meta_title" placeholder="Meta Title"
                                                class="form-control @error('meta_title') is-invalid @enderror"
                                                id="meta_title" value="{{ old('meta_title') }}">
                                            @error('meta_title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <label for="meta_description" class="form-label">Meta Description</label>
                                            <textarea rows="4" name="meta_description" placeholder="Meta Description"
                                                class="form-control @error('meta_description') is-invalid @enderror" id="meta_description">{{ old('meta_description') }}</textarea>
                                            @error('meta_description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                            <textarea rows="4" name="meta_keywords" placeholder="Meta Keywords"
                                                class="form-control @error('meta_keywords') is-invalid @enderror" id="meta_keywords">{{ old('meta_keywords') }}</textarea>
                                            @error('meta_keywords')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-start">
                            <button type="submit" class="btn btn-lg btn-primary">Save</button>
                        </div>
                    </form>
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
                '{{ asset('admin/assets/img/1290X730.svg') }}');
        });
    </script>
    <script>
        // Handle Upload Button Click
        document.getElementById('uploadVideoButton').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('videoInputTag').click();
        });

        // Handle Image File Selection
        document.getElementById('videoInputTag').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('videoTag').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(file);
            }
        });

        // Handle Remove Button Click
        document.getElementById('removeVideoButton').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('videoTag').setAttribute('src', '');
        });
    </script>
@endsection
