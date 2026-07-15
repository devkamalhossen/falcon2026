@extends('admin.layouts.master')
@section('title', 'Service Management')
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
            <h1>Service Management</h1>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Services</li>
                        <li class="breadcrumb-item active">Manage Service</li>
                    </ol>
                </nav>
                <a href="{{ route('service.create') }}" class="btn btn-primary btn-sm">Add New</a>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Created By</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $item)
                                        <tr>
                                            <td>
                                                @if ($item->image)
                                                    <img src="{{ asset($item->image) }}" class="rounded" alt=""
                                                        width="100">
                                                @else
                                                    <img src="{{ asset('admin/assets/img/1290X730.svg') }}" class="rounded"
                                                        alt="" width="50">
                                                @endif

                                            </td>
                                            <td>
                                                <p class="mb-0"> {{ $item->category?->name }}</p>
                                            </td>
                                            <td>{{ $item->title }}</td>
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
                                                                    href="{{ route('description.index', $item->id) }}"><i
                                                                        class="bx bxr-eye"></i> Description</a></li>
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('feature.index', $item->id) }}"><i
                                                                        class="bx bxr-eye"></i> Features</a></li>
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('benefit.index', $item->id) }}"><i
                                                                        class="bx bxr-eye"></i> Benefits</a></li>
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('usage-area.index', $item->id) }}"><i
                                                                        class="bx bxr-eye"></i> Usage Area</a></li>
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('gallery.index', $item->id) }}"><i
                                                                        class="bx bxr-eye"></i> Gallery</a></li>
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('faq.index', $item->id) }}"><i
                                                                        class="bx bxr-eye"></i> FAQ</a></li>
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('service.edit', $item->id) }}"><i
                                                                        class="bx bxs-edit-alt"></i> Edit</a></li>
                                                            <li>
                                                                <form action="{{ route('service.destroy', $item->id) }}"
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
                                                                <a href="{{ route('service.status.update', $item->id) }}"
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
            </div>
        </section>

    </main><!-- End #main -->
@endsection
