@extends('admin.layouts.master')
@section('title', 'Customer Messages')
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
            <h1>Customer Messages Management</h1>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Customer Messages</li>
                        <li class="breadcrumb-item active">Customer Messages</li>
                    </ol>
                </nav>
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
                                        <th>Project ID</th>
                                        <th>Service ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Created By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $item)
                                        <tr>
                                            <td width='10%'>
                                                {{ $item->project?->name }}
                                            </td>
                                            <td width='10%'>
                                                {{ $item->service?->title }}
                                            </td>
                                            <td width='10%'>
                                                {{ $item->name }}
                                            </td>
                                            <td width='10%'>
                                                {{ $item->phone }}
                                            </td>
                                            <td width='10%'>
                                                {{ $item->email }}
                                            </td>
                                            <td width='38%'>
                                                {{ $item->message }}
                                            </td>
                                            <td width='12%'>
                                                <p class="mb-0"> {{ $item->createdBy?->name }}</p>
                                                <p class="mb-0"> {{ $item->created_at }}</p>
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
