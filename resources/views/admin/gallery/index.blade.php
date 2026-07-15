@extends('admin.layouts.master')
@section('title', 'Gallery Management')
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
            <h1>Gallery Management</h1>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Gallerys</li>
                        <li class="breadcrumb-item active">Manage Gallery</li>
                    </ol>
                </nav>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Image</th>
                                        <th>Alt Name</th>
                                        <th>Video ID</th>
                                        <th>Created By</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($galleries as $item)
                                        <tr>
                                            <td>{{ $item->type == 1 ? 'Image' : 'Video' }}</td>
                                            <td>
                                                @if ($item->image)
                                                    <img src="{{ asset($item->image) }}" class="rounded" alt=""
                                                        width="100">
                                                @else
                                                    <img src="{{ asset('admin/assets/img/profile-placeholder.png') }}"
                                                        class="rounded" alt="" width="50">
                                                @endif

                                            </td>
                                            <td>{{ $item->alt_name }}</td>
                                            <td>{{ $item->video_id }}</td>
                                            <td>
                                                <p class="mb-0"> {{ $item->createdBy?->name }}</p>
                                                <p class="mb-0"> {{ $item->created_at }}</p>
                                            </td>

                                            <td>
                                                @if ($item->is_active == 1)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center justify-start gap-2">
                                                    <div class="dropdown">
                                                        <button class="btn btn-outline-secondary dropdown-toggle btn-sm"
                                                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('galleries.edit', $item->id) }}"><i
                                                                        class="bx bxs-edit-alt"></i> Edit</a></li>
                                                            <li>
                                                                <form action="{{ route('galleries.destroy', $item->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button style="display: flex;align-items:center;"
                                                                        onclick="return confirm('Are you sure to delete this item?')"
                                                                        class="dropdown-item text-danger" type="submit"><i
                                                                            class="bx bxs-trash"></i> Delete</button>
                                                                </form>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('galleries.status.update', $item->id) }}"
                                                                    class="text-{{ $item->is_active == 1 ? 'danger' : 'success' }}"><i
                                                                        class="ri-eye-{{ $item->is_active == 1 ? 'off-' : '' }}line"></i>
                                                                    {{ $item->is_active == 1 ? ' Turn Disable' : ' Turn Active' }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="card">
                        @if ($gallery)
                            <div class="card-body">
                                <form class="row g-2" action="{{ route('galleries.update', $gallery->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-12">
                                        <label for="cat" class="form-label">Category</label>
                                        <select name="category_id" id="category_id" class="form-control" required>
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option {{ $gallery->category_id == $category->id ? 'selected' : '' }}
                                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="type" class="form-label">Type</label>
                                        <select name="type" onchange="changeType(this.value)" id="type"
                                            class="form-control" required>
                                            <option value="">Select Type</option>
                                            <option {{ $gallery->type == 1 ? 'selected' : '' }} value="1">Image
                                            </option>
                                            <option {{ $gallery->type == 2 ? 'selected' : '' }} value="2">Video
                                            </option>
                                        </select>
                                        @error('type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="imageSection">
                                        <div class="col-12 p-2 text-center">
                                            <div>
                                                <img id="profileImage" src="{{ asset($gallery->image) }}" alt="image"
                                                    width="30%">
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
                                            <label for="alt_name" class="form-label">Alter Name</label>
                                            <input type="text" name="alt_name" placeholder="Alter Name"
                                                value="{{ $gallery->alt_name }}"
                                                class="form-control @error('alt_name') is-invalid @enderror"
                                                id="alt_name">
                                            @error('alt_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="videoSection">
                                        <div class="col-12 ">
                                            <label for="alt_name" class="form-label">Youtube Video ID</label>
                                            <input type="text" name="video_id" placeholder="Video ID"
                                                value="{{ $gallery->video_id }}"
                                                class="form-control @error('video_id') is-invalid @enderror"
                                                id="video_id">
                                            @error('video_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="is_active" class="form-label">Is Active</label>
                                        <select name="is_active" id="" class="form-control" required>
                                            <option {{ $gallery->is_active == 1 ? 'selected' : '' }} value="1">Active
                                            </option>
                                            <option {{ $gallery->is_active == 0 ? 'selected' : '' }} value="0">
                                                Inactive
                                            </option>
                                        </select>
                                        @error('is_active')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="text-end">
                                        <a href="{{ route('client.index') }}" class="btn btn-sm btn-danger">Cancel</a>
                                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                    </div>
                                </form><!-- Vertical Form -->

                            </div>
                        @else
                            <div class="card-body">
                                <form class="row g-2" action="{{ route('galleries.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                     <div class="col-12">
                                        <label for="cat" class="form-label">Category</label>
                                        <select name="category_id" id="category_id" class="form-control" required>
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option 
                                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="type" class="form-label">Type</label>
                                        <select name="type" onchange="changeType(this.value)" id="type"
                                            class="form-control" required>
                                            <option value="">Select Type</option>
                                            <option value="1">Image</option>
                                            <option value="2">Video</option>
                                        </select>
                                        @error('type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="imageSection">
                                        <div class="col-12 p-2 text-center">
                                            <div>
                                                <img id="profileImage"
                                                    src="{{ asset('admin/assets/img/placeholder.png') }}"
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
                                            <label for="alt_name" class="form-label">Alter Name</label>
                                            <input type="text" name="alt_name" placeholder="Alter Name"
                                                class="form-control @error('alt_name') is-invalid @enderror"
                                                id="alt_name">
                                            @error('alt_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 videoSection">
                                        <label for="video_id" class="form-label">Youtube Video ID</label>
                                        <input type="text" name="video_id" placeholder="Youtube Video id"
                                            class="form-control @error('video_id') is-invalid @enderror" id="video_id">
                                        @error('video_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="is_active" class="form-label">Is Active</label>
                                        <select name="is_active" id="" class="form-control" required>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        @error('is_active')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                    </div>
                                </form><!-- Vertical Form -->

                            </div>
                        @endif
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
                '{{ asset('admin/assets/img/350X165.svg') }}');
        });
    </script>

    <script>
        function changeType(typeValue) {
            let imageSection = document.querySelector(".imageSection");
            let videoSection = document.querySelector(".videoSection");

            if (typeValue == "1") {
                imageSection.style.display = "block";
                videoSection.style.display = "none";
            } else if (typeValue == "2") {
                imageSection.style.display = "none";
                videoSection.style.display = "block";
            } else {
                imageSection.style.display = "none";
                videoSection.style.display = "none";
            }
        }

        // Run on page load if editing
        document.addEventListener("DOMContentLoaded", function() {
            let typeSelect = document.getElementById("type");
            changeType(typeSelect.value);
        });
    </script>
@endsection
