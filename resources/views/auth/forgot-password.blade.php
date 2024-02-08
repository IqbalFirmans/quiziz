@extends('auth.layouts.main')
@section('title', 'Forgot Password')
@section('content')
    <div class="page-header min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ">
                    <div class="card card-plain">
                        <div class="card-header">
                            <h4 class="font-weight-bolder">Forgot Password</h4>
                            <p class="mb-0">We will send a link to reset your password</p>
                        </div>
                        <div class="card-body">
                            <form role="form" action="{{ route('password.email') }}" method="POST">
                                @csrf
                                <div class="input-group input-group-outline mb-3 mt-0">
                                    <input type="email" name="email" class="form-control border border-lg p-2"
                                        placeholder="Email">
                                </div>
                                <div class="text-center">
                                    <button type="submit" value="Request Password" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Forgot Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
