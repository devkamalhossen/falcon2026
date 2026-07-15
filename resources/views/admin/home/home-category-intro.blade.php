@extends('admin.layouts.master')
@section('title', 'Home Category Intro')
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
            <h1>Home Category Intro</h1>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Home Category Intro Content</li>
                    </ol>
                </nav>
            </div>
        </div>

        <section class="section">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <form class="row g-2" action="{{ route('home.category.intro.update', $pageData?->id) }}"
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
                                    <label for="description" class="form-label">Description</label>
                                    <textarea rows="8" cols="30" name="description" placeholder="Description"
                                        class="form-control @error('description') is-invalid @enderror" id="description">{{ $pageData?->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="text-end mt-10">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>

                            </form><!-- Vertical Form -->

                        </div>

                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
