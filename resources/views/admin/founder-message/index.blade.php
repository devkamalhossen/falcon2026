@extends('admin.layouts.master')
@section('title', 'Founder Message')

@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Founder Message</h1>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Founder Message</li>
                        <li class="breadcrumb-item active">Founder Message Content</li>
                    </ol>
                </nav>
            </div>
        </div>

        <section class="section">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <form class="row g-2" action="{{ route('founder-message.update', $pageData?->id) }}"
                                 method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                 <div class="col-12">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" placeholder="Title"
                                        class="form-control @error('title') is-invalid @enderror" id="title"
                                        value="{{ $pageData?->title }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" placeholder="Name"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        value="{{ $pageData?->name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                 <div class="col-12">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" name="designation" placeholder="Designation"
                                        class="form-control @error('designation') is-invalid @enderror" id="designation"
                                        value="{{ $pageData?->designation }}">
                                    @error('designation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                 <div class="col-12">
                                    <label for="company" class="form-label">Company</label>
                                    <input type="text" name="company" placeholder="Company"
                                        class="form-control @error('company') is-invalid @enderror" id="company"
                                        value="{{ $pageData?->company }}">
                                    @error('company')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="ct" class="col-form-label">Description</label>
                                   
                                        <textarea cols="30" class="form-control" rows="8"  name="description" id="description"
                                             >{{ $pageData?->description }}</textarea>
                                    </div>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                  <div class="col-12 p-2 text-center">
                                        <div>
                                            @if($pageData?->image)
                                            <img id="profileImage" src="{{ asset($pageData?->image) }}"
                                                alt="image" width="30%">
                                            @else 
                                                <img id="profileImage"   src="{{asset('admin/assets/img/placeholder.png')}}" alt="">
                                            @endif
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

                                    <br>
                                    
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                                <br>
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
                '{{ asset('admin/assets/img/placeholder.png') }}');
        });
    </script>
@endsection
