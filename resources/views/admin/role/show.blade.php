@extends('admin.layouts.master')
@section('title', 'Role Create')

@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Role Show</h1>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Roles</li>
                        <li class="breadcrumb-item ">Role</li>
                        <li class="breadcrumb-item active">Show</li>
                    </ol>
                </nav>
                <a href="{{ route('role.index') }}" class="btn btn-primary btn-sm">Go Back</a>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body ">
                            <div class="row">
                                @php
                                    $hasPermissions = $permissionGroups->pluck('permissions')->flatten()->count() > 0;
                                @endphp

                                @if ($hasPermissions)
                                    @foreach ($permissionGroups as $group)
                                        <div class="col-3 px-2 py-4">
                                            <h5 class="mb-2">{{ $group->name }}</h5>
                                            @foreach ($group->permissions as $permission)
                                                <label class="d-block mb-2" for="permission">
                                                    {{ $permission->name }}
                                                </label>
                                            @endforeach
                                        </div>
                                    @endforeach
                                @else
                                    <h4 class="text-center mb-0 p-3">No permissions assigned.</h4>
                                @endif

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
