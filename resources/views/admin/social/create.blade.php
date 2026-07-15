@extends('admin.layouts.master')
@section('title', 'Social Create')

@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Social Create</h1>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Socials</li>
                        <li class="breadcrumb-item ">Social</li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </nav>
                <a href="{{ route('social.index') }}" class="btn btn-primary btn-sm">Go Back</a>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <form class="row g-3" action="{{ route('social.store') }}" method="POST">
                                @csrf
                                <div class="col-12 p-2">
                                    <label for="inputNanme4" class="form-label">Name</label>
                                    <input type="text" name="name" placeholder="Name"
                                        class="form-control @error('name') is-invalid @enderror" id="inputNanme4" required
                                        autofocus>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 p-2">
                                    <label for="inputNanme2" class="form-label">Link</label>
                                    <input type="url" name="link" placeholder="Link"
                                        class="form-control @error('link') is-invalid @enderror" id="inputNanme2" required
                                        autofocus>
                                    @error('link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
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
