@extends('admin.layouts.master')
@section('title', 'Achievement Content')
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
            <h1>Achievement Content</h1>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Achievement Content</li>
                        <li class="breadcrumb-item active">Achievement Content Content</li>
                    </ol>
                </nav>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="row g-2" action="{{ route('achievement.content.update', $pageData?->id) }}" method="POST">
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
                               
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" placeholder="Section Description" rows="4"
                                        class="form-control @error('description') is-invalid @enderror" id="description">{{ $pageData?->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

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