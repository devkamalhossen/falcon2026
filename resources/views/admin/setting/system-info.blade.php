@extends('admin.layouts.master')
@section('title', 'System Information')

@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>System Information</h1>
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">System information</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5>Application Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Application Version</h5>
                                    <strong>{{env('APP_VERSION')}}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Laravel Version</h5>
                                    <strong>{{ App::VERSION() }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Timezone</h5>
                                    <strong>{{ config('app.timezone')}}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5>Server Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card">

                                <div class="card-body">
                                    <h5>PHP Version</h5>
                                    <strong>{{ phpversion() }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Server Software</h5>
                                    <strong>{{ $_SERVER['SERVER_SOFTWARE'] ?? 'N/A' }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Server IP</h5>
                                    <strong>{{ $_SERVER['SERVER_ADDRESS'] ?? 'N/A' }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Server Protocol</h5>
                                    <strong>
                                        {{ $_SERVER['SERVER_PROTOCOL'] ?? 'N/A' }}
                                    </strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>HTTP Host</h5>
                                    <strong>{{ $_SERVER['HTTP_HOST'] ?? 'N/A' }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>HTTP Port</h5>
                                    <strong>{{ $_SERVER['SERVER_PORT'] ?? 'N/A' }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
