@extends('auth.layouts.main')
@section('title', 'Update Password')
@section('content')
    <div class="page-header min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ">
                    <div class="card card-plain">
                        <div class="card-header">
                            <h4 class="font-weight-bolder">Reset Password</h4>
                            <p class="mb-0">We will reset your password</p>
                        </div>
                        <div class="card-body">
                            <form role="form" action="{{ route('password.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{ request()->token }}">
                                <input type="hidden" name="email" value="{{ request()->email }}">
                                <div class="input-group input-group-outline mb-3 mt-0">
                                    <input type="password" name="password" class="form-control border border-lg p-2" placeholder="Password">
                                </div>
                                <div class="input-group input-group-outline mb-3 mt-0">
                                    <input type="password" name="password_confirmation" class="form-control border border-lg p-2"
                                        placeholder="Password Confirmation">
                                </div>
                                <div class="text-center">
                                    <button type="submit" value="Update Password"
                                        class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Update
                                        Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
