@extends('user.layouts.main')
@section('title', 'My Posts')
@section('content')

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
            width: 100%;
            height: auto
        }

        a {
            text-decoration: none;
        }
    </style>

    <div class="container mt-4 mb-5">
        <div class="d-flex justify-content-center">
            <div class="row">
                @forelse ($posts as $post)
                    <div class="col-lg-6">
                        <div class="bg-white border mt-2">
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
                            <div class="feed-image p-2 px-3">
                                <img class="img-fluid img-responsive" src="{{ asset('storage/' . $post->image) }}">
                            </div>
                            <div class="p-2 px-3">
                                Description :
                                <span>{{ $post->description }}</span>
                            </div>
                            <div class="d-flex justify-content-end socials p-2">
                                <a href="">
                                    <i class="fa fa-eye text-info">
                                        <small></small>
                                    </i>
                                </a>

                                <a href="{{ route('myposts.edit', $post->id) }}">
                                    <i class="fa fa-edit text-warning"></i>
                                </a>

                                <form action="{{ route('myposts.destroy', $post->id) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="border-0">
                                        <i class="fa fa-times-circle text-danger">
                                            <small></small>
                                        </i>
                                    </button>
                                </form>
                            </div>
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
