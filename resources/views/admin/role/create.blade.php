@extends('admin.layouts.master')
@section('title', 'Role Create')

@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Role Create</h1>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Roles</li>
                        <li class="breadcrumb-item ">Role</li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </nav>
                <a href="{{ route('role.index') }}" class="btn btn-primary btn-sm">Go Back</a>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                   
                    <div class="card">
                        <div class="card-body">
                            <form class="row g-3" action="{{ route('role.store') }}" method="POST">
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


                                @foreach ($permissionGroups as $group)
                                    <div class="col-3">
                                        <h5 class="mb-0">{{ $group->name }}</h5>
                                        @foreach ($group->permissions as $permission)
                                            <label class="d-block mb-2" for="permission{{ $permission->id }}">
                                                <input type="checkbox" id="permission{{ $permission->id }}"
                                                    name="permissions[]" value="{{ $permission->id }}">
                                                {{ $permission->name }}
                                            </label>
                                        @endforeach
                                    </div>
                                @endforeach

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
