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
                        <a class="btn btn-link px-3" href="/auth/github/redirect">
                            <i class="fa fa-github text-primary text-lg"></i> <br>
                            With Github
                        </a>
                        <div class="card-body">
                            <form role="form" action="{{ route('auth.register') }}" method="POST">
                                @csrf
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" name="name" placeholder="Name"
                                        class="form-control border border-lg p-2">
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="email" name="email" class="form-control border border-lg p-2"
                                        placeholder="Email">
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <input id="password" type="password" name="password"
                                        class="form-control border border-lg p-2" placeholder="Password">
                                    <svg id="eye_slash" style="position: absolute;right: 8;top: 8;" onclick="eye_slash()"
                                        xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                        viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                            d="M53.92 34.62a8 8 0 1 0-11.84 10.76l19.24 21.17C25 88.84 9.38 123.2 8.69 124.76a8 8 0 0 0 0 6.5c.35.79 8.82 19.57 27.65 38.4C61.43 194.74 93.12 208 128 208a127.11 127.11 0 0 0 52.07-10.83l22 24.21a8 8 0 1 0 11.84-10.76Zm89 121.69a32 32 0 0 1-41.67-45.85Zm104.39-25.05c-.42.94-10.55 23.37-33.36 43.8a8 8 0 0 1-11.26-.57L101.4 63.07a8 8 0 0 1 4.6-13.28A134 134 0 0 1 128 48c34.88 0 66.57 13.26 91.66 38.35c18.83 18.83 27.3 37.62 27.65 38.41a8 8 0 0 1 0 6.5" />
                                    </svg>
                                    <svg id="eye" style="position: absolute;right: 8;top: 8;display:none;"
                                        onclick="eye()" xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                    </svg>
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
