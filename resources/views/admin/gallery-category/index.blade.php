@extends('admin.layouts.master')
@section('title', 'Gallery Category')
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
            <h1>Gallery Category</h1>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Gallerys Category</li>
                        <li class="breadcrumb-item active">Manage Gallery Category</li>
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
                                        <th>Name</th>
                                        <th>Created By</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $item)
                                        <tr>
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
                                                                    href="{{ route('gallery-category.edit', $item->id) }}"><i
                                                                        class="bx bxs-edit-alt"></i> Edit</a></li>
                                                            <li>
                                                                <form
                                                                    action="{{ route('gallery-category.destroy', $item->id) }}"
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
                                                                <a href="{{ route('gallery-category.status.update', $item->id) }}"
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
                        @if ($gallery_category)
                            <div class="card-body">
                                <form class="row g-2"
                                    action="{{ route('gallery-category.update', $gallery_category->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-12 ">
                                        <label for="alt_name" class="form-label">Name</label>
                                        <input type="text" name="name" placeholder="Name"
                                            value="{{ $gallery_category->name }}"
                                            class="form-control @error('name') is-invalid @enderror" id="name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="is_active" class="form-label">Is Active</label>
                                        <select name="is_active" id="" class="form-control" required>
                                            <option {{ $gallery_category->is_active == 1 ? 'selected' : '' }}
                                                value="1">Active
                                            </option>
                                            <option {{ $gallery_category->is_active == 0 ? 'selected' : '' }}
                                                value="0">
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
                                <form class="row g-2" action="{{ route('gallery-category.store') }}" method="POST">
                                    @csrf
                                    <div class="col-12">
                                        <label for="name" class="form-label"> Name</label>
                                        <input type="text" name="name" placeholder="Name"
                                            class="form-control @error('name') is-invalid @enderror" id="name">
                                        @error('name')
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
