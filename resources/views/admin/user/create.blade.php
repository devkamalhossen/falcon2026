@extends('admin.layouts.master')
@section('title', 'User Create')

@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>User Create</h1>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Users</li>
                        <li class="breadcrumb-item ">User</li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </nav>
                <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm">Go Back</a>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="card">
                        <div class="card-body">
                            <form class="row g-2" action="{{ route('user.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-12 p-2 text-center">
                                    <div>
                                        <img id="profileImage" src="{{ asset('admin/assets/img/profile-placeholder.png') }}"
                                            alt="Profile" style="max-width: 150px;">
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
                                <div class="col-12 col-lg-6 col-md-6">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role_id" id="role" class="form-control" required>
                                        <option value="">select role</option>
                                        @foreach ($activeRoles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <label for="inputNanme4" class="form-label">Name</label>
                                    <input type="text" name="name" placeholder="Name"
                                        class="form-control @error('name') is-invalid @enderror" id="inputNanme4" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" placeholder="Email"
                                        class="form-control @error('email') is-invalid @enderror" id="email" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="number" placeholder="Phone Number"
                                        class="form-control @error('number') is-invalid @enderror" id="phone" required>
                                    @error('number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" placeholder="Password"
                                        class="form-control @error('password') is-invalid @enderror" id="password"
                                        required>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <label for="password_confirmation" class="form-label">Password Confirmation</label>
                                    <input type="password" name="password_confirmation" placeholder="Password Confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation" required>
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <label for="is_active" class="form-label">Is Active</label>
                                    <select name="is_active" id="" class="form-control">
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
                '{{ asset('admin/assets/img/profile-placeholder.png') }}');
        });
    </script>
@endsection
