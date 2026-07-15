@extends('admin.layouts.master')
@section('title', 'Page Edit')

@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Page Edit</h1>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Pages</li>
                        <li class="breadcrumb-item ">Page</li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </nav>
                <a href="{{ route('page.index') }}" class="btn btn-primary btn-sm">Go Back</a>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('page.update', $page->id) }}" method="POST" id="pageForm" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="card">
                            <div class="card-body">
                                <div class="row py-4">
                                    <div class="col-6 col-lg-6 col-md-6">
                                        <div class="mb-2">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name" placeholder=" Name"
                                                class="form-control @error('name') is-invalid @enderror" id="name" value="{{$page?->name}}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        
                                        <div class="mb-2">
                                            <label for="slug" class="form-label">Slug</label>
                                            <input type="text" name="slug" placeholder="slug"
                                                class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{$page?->slug}}">
                                            @error('slug')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                       
                                        <div class="mb-2">
                                            <label for="is_active" class="form-label">Is Active</label>
                                            <select name="is_active" id="" class="form-control" required>
                                                <option {{$page->is_active == 1 ? 'selected':''}} value="1">Active</option>
                                                <option {{$page->is_active == 0 ? 'selected':''}} value="0">Inactive</option>
                                            </select>
                                            @error('is_active')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-6 p-2 text-center">
                                        <div>
                                            <img id="profileImage" src="{{ asset($page?->image) }}"
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body" style="height: 400px;padding-top: 20px;">
                                <div class="page-quill-editor-full" style="border: none;">{!! $page?->description !!}</div>
                                <input type="hidden" name="description" id="description" value="{{$page?->description}}" />
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
                                                id="meta_title" value="{{$page->meta_title}}">
                                            @error('meta_title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <label for="meta_description" class="form-label">Meta Description</label>
                                            <textarea rows="4" name="meta_description" placeholder="Meta Description"
                                                class="form-control @error('meta_description') is-invalid @enderror" id="meta_description">{{$page->meta_description}}</textarea>
                                            @error('meta_description')
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
@endsection
