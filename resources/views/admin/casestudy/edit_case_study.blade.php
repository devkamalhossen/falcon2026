@extends('admin.layouts.master')

@section('main') 
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit Case Study</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                          
                            <form class="row g-2" action="{{ route('update_case_study', $updateData->id) }}" method="POST">
                                @csrf
                              
                                <div class="col-4">
                                    <label for="header" class="form-label">Header</label>
                                    <input type="text" name="header" class="form-control" id="header" value="{{ $updateData->header }}">
                                </div>

                                <div class="col-4">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ $updateData->title }}">
                                </div>

                                <div class="col-4">
                                    <label for="area" class="form-label">Area</label>
                                    <input type="text" name="area" class="form-control" id="area" value="{{ $updateData->area }}">
                                </div>

                                <div class="col-4">
                                    <label for="industry" class="form-label">Industry</label>
                                    <input type="text" name="industry" class="form-control" id="industry" value="{{ $updateData->industry }}">
                                </div>

                                <div class="col-4">
                                    <label for="solution" class="form-label">Solution</label>
                                    <input type="text" name="solution" class="form-control" id="solution" value="{{ $updateData->solution }}">
                                </div>

                                <div class="col-4">
                                    <label for="timeline" class="form-label">Timeline</label>
                                    <input type="text" name="timeline" class="form-control" id="timeline" value="{{ $updateData->timeline }}">
                                </div>

                                <div class="col-12">
                                    <label for="outcome" class="form-label">Outcome</label>
                                    <textarea name="outcome" class="form-control" id="outcome" rows="3">{{ $updateData->outcome }}</textarea>
                                </div>

                                <div class="text-end mt-3">
                                    <button type="submit" class="btn btn-primary">Update Case Study</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection