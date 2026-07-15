@extends('admin.layouts.master')
@section('title', 'Service Category Management')
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
            <h1>Service Category Management</h1>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Service Categorys</li>
                        <li class="breadcrumb-item active">Manage Service Category</li>
                    </ol>
                </nav>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-7">

                    <div class="card">
                        <div class="card-body">

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Created By</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $item)
                                        <tr>
                                            <td>
                                                @if ($item->image)
                                                    <img src="{{ asset($item->image) }}" class="rounded" alt=""
                                                        width="50">
                                                @else
                                                    <img src="{{ asset('admin/assets/img/1290X730.svg') }}" class="rounded"
                                                        alt="" width="50">
                                                @endif

                                            </td>
                                            <td>{{ $item->name }}</td>
                                           
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
                                                                    href="{{ route('service-category.edit', $item->id) }}"><i
                                                                        class="bx bxs-edit-alt"></i> Edit</a></li>
                                                            <li>
                                                                <form
                                                                    action="{{ route('service-category.destroy', $item->id) }}"
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
                                                                <a href="{{ route('service.category.status.update', $item->id) }}"
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
                <div class="col-lg-5">
                    <div class="card">
                        @if ($service_category)
                            <div class="card-body">
                                <form class="row g-2"
                                    action="{{ route('service-category.update', $service_category->id) }}" method="POST"
                                    enctype="multipart/form-data" id="categoryForm">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-12 p-2 text-center">
                                        <div>
                                            <img id="profileImage" src="{{ asset($service_category->image) }}"
                                                alt="image" width="30%">
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
                                        <label for="name" class="form-label"> Name</label>
                                        <input type="text" name="name" placeholder="Name"
                                            value="{{ $service_category->name }}"
                                            class="form-control @error('name') is-invalid @enderror" id="name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                      <div class="col-12">
                                        <label for="description" class="form-label">Description</label>
                                         <div class="service-category-description-quill-editor-full" style="height: 300px;padding-top: 20px;">{!! $service_category?->description !!}</div>
                                <input type="hidden" name="description" id="description" value="{{old('description')}}" />
                                        {{-- <textarea rows="8" cols="30" name="description" placeholder="Description"
                                            class="form-control @error('description') is-invalid @enderror" id="description">{{$service_category->description}}</textarea> --}}
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="is_active" class="form-label">Is Active</label>
                                        <select name="is_active" id="" class="form-control" required>
                                            <option {{ $service_category->is_active == 1 ? 'selected' : '' }} value="1">
                                                Active</option>
                                            <option {{ $service_category->is_active == 0 ? 'selected' : '' }} value="0">
                                                Inactive</option>
                                        </select>
                                        @error('is_active')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="text-end">
                                        <a href="{{ route('service-category.index') }}"
                                            class="btn btn-sm btn-danger">Cancel</a>
                                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                    </div>
                                </form><!-- Vertical Form -->
                            </div>
                        @else
                            <div class="card-body">
                                <form class="row g-2" action="{{ route('service-category.store') }}" method="POST"
                                    enctype="multipart/form-data"  id="categoryForm">
                                    @csrf
                                    <div class="col-12 p-2 text-center">
                                        <div>
                                            <img id="profileImage" src="{{ asset('admin/assets/img/1290X730.svg') }}"
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
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" placeholder="Name"
                                            class="form-control @error('name') is-invalid @enderror" id="name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                      <div class="col-12">
                                        <label for="description" class="form-label">Description</label>
                                         <div class="service-category-description-quill-editor-full" style="height: 300px;padding-top: 20px;"></div>
                                <input type="hidden" name="description" id="description" value="{{old('description')}}" />
                                        {{-- <textarea rows="8" cols="30" name="description" placeholder="Description"
                                            class="form-control @error('description') is-invalid @enderror" id="description">{{old('description')}}</textarea> --}}
                                        @error('description')
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
                '{{ asset('admin/assets/img/1290X730.svg') }}');
        });
    </script>
@endsection
