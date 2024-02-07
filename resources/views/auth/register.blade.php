@extends('auth.layouts.main')
@section('title', 'Register')
@section('content')
    <div class="page-header min-vh-100">
        <div class="container">
            <div class="row">
                <div
                    class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">

                    {{--  --}}
                    <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                        style="background-image: url('{{ asset('admin/assets/img/illustrations/illustration-signup.jpg') }}'); background-size: cover;">
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                    <div class="card card-plain">
                        <div class="card-header">
                            <h4 class="font-weight-bolder">Sign Up</h4>
                            <p class="mb-0">Enter your email and password to register</p>
                        </div>
                        <div class="card-body">
                            <form role="form" action="{{ route('auth.register') }}" method="POST">
                                @csrf
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" name="name" placeholder="Name" class="form-control border border-lg p-2">
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="email" name="email" class="form-control border border-lg p-2" placeholder="Email">
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="password" name="password" class="form-control border border-lg p-2" placeholder="Password">
                                </div>
                                <div class="form-check form-check-info text-start ps-0">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        checked>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and
                                            Conditions</a>
                                    </label>
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                            <p class="mb-2 text-sm mx-auto">
                                Already have an account?
                                <a href="/auth/login" class="text-primary text-gradient font-weight-bold">Sign
                                    in</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
