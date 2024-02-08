@extends('user.layouts.main')
@section('title', 'Share')
@section('content')
    <style>
        .time {
            font-size: 9px !important
        }

        .socials i {
            margin-right: 14px;
            font-size: 17px;
            color: #d2c8c8;
            cursor: pointer
        }

        .feed-image img {
            width: 100%;
            height: auto
        }
        a {
            text-decoration: none;
        }
    </style>

    <div class="container mt-4 mb-5">
        <div class="d-flex justify-content-center">
            <div class="">
                <div class="feed p-2">
                    <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white border">
                        <div class="feed-text px-2">
                            <h6 class="text-black-50 mt-2">Share Your Result!</h6>
                        </div>
                    </div>
                    <div class="bg-white border mt-2">
                        <div>
                            <div class="d-flex flex-row justify-content-between align-items-center p-2 border-bottom">
                                <div class="d-flex flex-row align-items-center feed-text px-2">
                                    <img class="rounded-circle"
                                        src="{{ asset('admin/assets/img/home-decor-1.jpg') }}" height="45"
                                        width="45">
                                    <div class="d-flex flex-column flex-wrap ml-2 px-3">
                                        <span class="font-weight-bold">Thomson ben</span>
                                        <span class="text-black-50 time">40 minutes ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="feed-image p-2 px-3">
                            <img class="img-fluid img-responsive" src="{{ asset('admin/assets/img/bg-pricing.jpg') }}">
                        </div>
                        <div class="p-2 px-3"><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></div>
                        <div class="d-flex justify-content-end socials p-2 py-3">
                                <i class="fa fa-thumbs-up text-primary">
                                    <small>1000</small>
                                </i>
                            <a href="#comments_section" data-bs-toggle="collapse">
                                <i class="fa fa-comments"></i>
                            </a>
                        </div>
                        <div class="collapse" id="comments_section">
                            <section class="gradient-custom mb-4">
                                <div class="">
                                    <div class="d-flex justify-content-center">
                                        <div class="">
                                            <div class="card">
                                                <div class="card-body p-4">
                                                    <h4 class="text-center mb-4 pb-2">Nested comments section</h4>
                                                    <form action="" method="post">
                                                        @csrf
                                                        <textarea name="komentar" id="komentar" placeholder="Komentar..." class="form-control" cols="15" rows="5"></textarea>
                                                        <button type="submit" class="btn btn-primary mt-3" style="background-color: #e91e63;border:1px solid #e91e63;">Kirim</button>
                                                    </form>
                                                    <div class="mt-3">
                                                        <div class="">
                                                            <div class="d-flex flex-start my-2">
                                                                <img class="rounded-circle shadow-1-strong me-3"
                                                                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp"
                                                                    alt="avatar" width="35" height="35" />
                                                                <div class="flex-grow-1 flex-shrink-1">
                                                                    <div>
                                                                        <div
                                                                            class="d-flex justify-content-between align-items-center">
                                                                            <p class="mb-1">
                                                                                Maria Smantha <br>
                                                                                <span class="small">2 hours
                                                                                    ago</span>
                                                                            </p>
                                                                            <a href="#reply_comments_section" data-bs-toggle="collapse" class="text-primary"><i
                                                                                    class="fas fa-reply fa-xs"></i><span
                                                                                    class="small"> reply</span></a>
                                                                        </div>
                                                                        <p class="small mb-0">
                                                                            It is a long established fact that a reader will be
                                                                            distracted by
                                                                            the readable content of a page.
                                                                        </p>
                                                                    </div>
                                                                    <div class="collapse" id="reply_comments_section">
                                                                        <form action="" method="post" class="mt-2">
                                                                            @csrf
                                                                            <textarea name="komentar" id="komentar" placeholder="Komentar..." class="form-control" cols="15" rows="5"></textarea>
                                                                            <button type="submit" class="btn btn-primary mt-3" style="background-color: #e91e63;border:1px solid #e91e63;">Kirim</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
