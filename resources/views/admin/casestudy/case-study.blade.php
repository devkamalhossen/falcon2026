@extends('admin.layouts.master')


@section('main') {{-- অবশ্যই section content এর ভেতর থাকতে হবে --}}
    <style>
        /* আপনার সিএসএস ঠিক আছে */
        .tag { background: #007bff; color: #fff; padding: 4px 10px; border-radius: 20px; margin: 3px; display: flex; align-items: center; font-size: 14px; }
        .tag .remove-tag { margin-left: 6px; cursor: pointer; font-weight: bold; }
    </style>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Case Study Intro</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Case Study</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                           <form class="row g-2" action="{{ route('store_case_study') }}" id="caseStudyForm" method="POST">
                                @csrf

                                <div class="col-4">
                                    <label for="header" class="form-label">Header (e.g., Garment Factory)</label>
                                    <input type="text" name="header" class="form-control" id="header" value="{{ $pageData?->header }}">
                                </div>

                                <div class="col-4">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ $pageData?->title }}">
                                </div>

                                <div class="col-4">
                                    <label for="area" class="form-label">Area (sq.ft)</label>
                                    <input type="text" name="area" class="form-control" id="area" value="{{ $pageData?->area }}">
                                </div>

                                <div class="col-4">
                                    <label for="industry" class="form-label">Industry</label>
                                    <input type="text" name="industry" class="form-control" id="industry" value="{{ $pageData?->industry }}">
                                </div>

                                <div class="col-4">
                                    <label for="solution" class="form-label">Solution</label>
                                    <input type="text" name="solution" class="form-control" id="solution" value="{{ $pageData?->solution }}">
                                </div>

                                <div class="col-4">
                                    <label for="timeline" class="form-label">Timeline</label>
                                    <input type="text" name="timeline" class="form-control" id="timeline" value="{{ $pageData?->timeline }}">
                                </div>

                                <div class="col-12">
                                    <label for="outcome" class="form-label">Outcome</label>
                                    <textarea name="outcome" class="form-control" id="outcome" rows="3">{{ $pageData?->outcome }}</textarea>
                                </div>

                                <div class="text-end mt-3">
                                    <button type="submit" class="btn btn-primary">Save Case Study</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Table Section -->
       
        <section class="section mt-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> Case Studies List</h5>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Header</th>
                                        <th>Title</th>
                                        <th>Industry</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($caseStudies as $item)
                                    <tr>
                                        <td>{{ $item->header }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->industry }}</td>
                                        <td>
                                            <a href="{{ route('edit_case_study',$item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="{{ route('delete_case_study',$item->id) }}" class="btn btn-sm btn-danger">Delete</a>
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


    </main>
@endsection