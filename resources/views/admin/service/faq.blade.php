@extends('admin.layouts.master')
@section('title', 'FAQ')
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
            <h1>FAQs</h1>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">FAQs</li>
                        <li class="breadcrumb-item active">FAQs</li>
                    </ol>
                </nav>
                <a href="{{ route('service.index') }}" class="btn btn-sm btn-primary">Go Back</a>
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
                                        <th>Title</th>
                                        <th>Created By</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faqs as $item)
                                        <tr>

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
                                                                    href="{{ route('faq.edit', [$service, $item->id]) }}"><i
                                                                        class="bx bxs-edit-alt"></i> Edit</a></li>
                                                            <li>
                                                                <form
                                                                    action="{{ route('faq.destroy', [$service, $item->id]) }}"
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
                                                                <a href="{{ route('service.faq.status.update', [$service, $item->id]) }}"
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
                        @if ($faq)
                            <div class="card-body">
                                <form class="row g-2" action="{{ route('faq.update', [$service, $faq->id]) }}"
                                    method="POST" enctype="multipart/form-data" id="serviceFAQForm">
                                    @csrf
                                    @method('PUT')


                                    <div class="col-12">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" placeholder="Title"
                                            value="{{ $faq->title }}"
                                            class="form-control @error('title') is-invalid @enderror" id="title">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="title" class="form-label">Description</label>
                                        {{-- <textarea name="description" id="" cols="30" rows="5" class="form-control">{{ $faq->description }}</textarea> --}}
                                        <div class="service-faq-quill-editor-full" style="height: 300px;padding-top: 20px;">
                                            {!! $faq->description !!}</div>
                                        <input type="hidden" name="description" id="description"
                                            value="{{ old('description') }}" />
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="is_active" class="form-label">Is Active</label>
                                        <select name="is_active" id="" class="form-control" required>
                                            <option {{ $faq->is_active == 1 ? 'selected' : '' }} value="1">Active
                                            </option>
                                            <option {{ $faq->is_active == 0 ? 'selected' : '' }} value="0">
                                                Inactive</option>
                                        </select>
                                        @error('is_active')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="text-end">
                                        <a href="{{ route('faq.index', $service) }}"
                                            class="btn btn-sm btn-danger">Cancel</a>
                                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                    </div>
                                </form><!-- Vertical Form -->

                            </div>
                        @else
                            <div class="card-body">
                                <form class="row g-2" action="{{ route('faq.store', $service) }}" method="POST"
                                    enctype="multipart/form-data" id="serviceFAQForm">
                                    @csrf

                                    <div class="col-12">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" placeholder="Title"
                                            class="form-control @error('title') is-invalid @enderror" id="title">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="title" class="form-label">Description</label>
                                        {{-- <textarea name="description" id="" cols="30" rows="5" class="form-control"
                                            placeholder="Description"></textarea> --}}

                                        <div class="service-description-quill-editor-full"
                                            style="height: 300px;padding-top: 20px;"></div>
                                        <input type="hidden" name="description" id="description"
                                            value="{{ old('description') }}" />

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
