@extends('admin.layouts.master')
@section('title', 'Mail Setup')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Mail</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Mail Setting</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Change Password Form -->
                            <form action="{{ route('setting.general.mail.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="cols-12">
                                        <label for="mail_mailer" class=" col-form-label">Mailer</label>
                                        <div class="">
                                            <input type="text" name="mail_mailer" type="text" class="form-control"
                                                id="mail_mailer" value="{{ get_option('mail_mailer') }}">
                                        </div>
                                        <label for="mail_host" class=" col-form-label">Host</label>
                                        <div class="">
                                            <input type="text" name="mail_host" type="text" class="form-control"
                                                id="mail_host" value="{{ get_option('mail_host') }}">
                                        </div>
                                        <label for="mail_port" class=" col-form-label">Port</label>
                                        <div class="">
                                            <input type="text" name="mail_port" type="text" class="form-control"
                                                id="mail_port" value="{{ get_option('mail_port') }}">
                                        </div>

                                        <label for="mail_username" class=" col-form-label">Username</label>
                                        <div class="">
                                            <input type="text" name="mail_username" type="text" class="form-control"
                                                id="mail_username" value="{{ get_option('mail_username') }}">
                                        </div>

                                        <label for="mail_password" class=" col-form-label">Password</label>
                                        <div class="">
                                            <input type="text" name="mail_password" type="text" class="form-control"
                                                id="mail_password" value="{{ get_option('mail_password') }}">
                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-4">
                                    <div class="cols-12">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
