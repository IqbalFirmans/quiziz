@extends('user.layouts.main')
@section('title', 'Share')
@section('content')
    <style>
        .time {
            font-size: 11px !important
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
            <div class="col-lg-12">
                <div class="feed p-2">
                    <div class="p-2 bg-white border">
                        <div class="feed-text px-2">
                            <h6 class="text-black-50 mt-2">Share Your Result!</h6>
                            <hr>
                            <form action="{{ route('share.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3 col-9">
                                    <div class="col-3">
                                        <h6 class="mb-0">Upload Image</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3 col-9">
                                    <div class="col-3">
                                        <h6 class="mb-0">Description</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea name="description" class="form-control" rows="5" placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-primary">Send
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="m4.01 6.03l7.51 3.22l-7.52-1zm7.5 8.72L4 17.97v-2.22zM2.01 3L2 10l15 2l-15 2l.01 7L23 12z" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @forelse ($data as $posts)
                    <div class="bg-white border mt-2">
                        <div>
                            <div class="d-flex flex-row justify-content-between align-items-center p-2 border-bottom">
                                <div class="d-flex flex-row align-items-center feed-text px-2">
                                    <img class="rounded-circle" src="{{ $posts->user->photo ? asset('storage/' . $posts->user->photo) : asset('default.png') }}"
                                        height="45" width="45">

                                    <div class="d-flex flex-column flex-wrap ml-2 px-3">
                                        <span class="font-weight-bold">{{ $posts->user->name }}</span>
                                        <span class="text-black-30 time">{{ $posts->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="feed-image p-2 px-3">
                            <img class="img-fluid img-responsive" src="{{ asset('storage/' . $posts->image) }}">
                        </div>
                        <div class="p-2 px-3">
                            Description :
                            <span>{{ $posts->description }}</span>
                        </div>
                        <div class="d-flex justify-content-end socials p-2 py-3">
                            <i class="fa fa-thumbs-up text-primary">
                                <small>10</small>
                            </i>
                            <a href="#comments_section" data-bs-toggle="collapse">
                                <i class="fa fa-comments"></i>
                            </a>
                        </div>
                        <div class="collapse" id="comments_section">
                            <section class="gradient-custom mb-4">
                                <div class="d-flex justify-content-center">
                                    <div class="card">
                                        <div class="card-body p-4">
                                            <h4 class="text-center mb-4 pb-2">Nested comments section</h4>
                                            <form action="" method="post">
                                                @csrf
                                                <textarea name="komentar" id="komentar" placeholder="Komentar..." class="form-control" cols="15" rows="5"></textarea>
                                                <button type="submit" class="btn btn-primary mt-3"
                                                    style="background-color: #e91e63;border:1px solid #e91e63;">Kirim</button>
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
                                                                    <a href="#reply_comments_section"
                                                                        data-bs-toggle="collapse" class="text-primary"><i
                                                                            class="fas fa-reply fa-xs"></i><span
                                                                            class="small"> reply</span></a>
                                                                </div>
                                                                <p class="small mb-0">
                                                                    It is a long established fact that a reader
                                                                    will be
                                                                    distracted by
                                                                    the readable content of a page.
                                                                </p>
                                                            </div>
                                                            <div class="collapse" id="reply_comments_section">
                                                                <form action="" method="post" class="mt-2">
                                                                    @csrf
                                                                    <textarea name="komentar" id="komentar" placeholder="Komentar..." class="form-control" cols="15" rows="5"></textarea>
                                                                    <button type="submit" class="btn btn-primary mt-3"
                                                                        style="background-color: #e91e63;border:1px solid #e91e63;">Kirim</button>
                                                                </form>
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
                @empty
                <div class="d-flex justify-content-center">
                    <div class="text-center col-lg-8">
                        <img src="{{ asset('no-data.jpg') }}" alt="no-data" class="img-fluid">
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>

@endsection
