@extends('user.layouts.main')
@section('title', 'Edit Post')
@section('content')

    {{-- <div class="container mt-4 mb-5">
        <div class="d-flex justify-content-center">
            <div class="col-lg-12">
                <div class="feed p-2">
                    <div class="p-2 bg-white border">
                        <div class="feed-text px-2">
                            <h6 class="text-black-50 mt-2">Edit Postingan</h6>
                            <hr>
                            <form action="{{ route('share.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3 col-9">
                                    <div class="feed-image p-2 px-3">
                                        <img class="img-fluid img-responsive" src="{{ asset('storage/' . $post->image) }}">
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
            </div>
        </div>
    </div> --}}


    <style>
        .time {
            font-size: 12px !important
        }

        button {
            background-color: #fbfbfb;
        }

        .socials i {
            margin-right: 14px;
            font-size: 17px;
            color: #d2c8c8;
            cursor: pointer
        }

        .feed-image img {
            width: 85%;
            height: auto;
        }

        a {
            text-decoration: none;
        }
    </style>

    <h1 class="text-center text-uppercase">Edit Description</h1>
    <div class="container mt-2 mb-5">
        <div class="d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="bg-white border">
                    <div>
                        <div class="d-flex flex-row justify-content-between align-items-center p-2 border-bottom">
                            <div class="d-flex flex-row align-items-center feed-text px-2">
                                <img class="rounded-circle"
                                    src="{{ $post->user->photo ? asset('storage/' . $post->user->photo) : asset('default.png') }}"
                                    height="45" width="45">

                                <div class="d-flex flex-column flex-wrap ml-2 px-3">
                                    <span class="font-weight-bold">{{ $post->user->name }}</span>
                                    <span class="text-black-30 time">{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('myposts.update', $post->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="p-2 px-3">
                            <textarea name="description" cols="30" rows="8" class="form-control">{{ $post->description }}</textarea>
                        </div>
                        <div class="d-flex justify-content-end socials p-2 gap-2">
                            <a href="/user/my-posts" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
