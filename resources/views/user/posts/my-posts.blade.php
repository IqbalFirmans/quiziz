@extends('user.layouts.main')
@section('title', 'My Posts')
@section('content')

    <style>
        .time {
            font-size: 12px !important
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

                                <a href="" data-bs-toggle="modal"
                                    data-bs-target="#modal_confirm_delete{{ $post->id }}">
                                    <i class="fa fa-times-circle text-danger"></i>
                                </a>

                                {{-- modal delete --}}
                                <div class="modal fade" id="modal_confirm_delete{{ $post->id }}"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('myposts.destroy', $post->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body text-center">
                                                    <b>
                                                        Apakah anda yakin mau menghapus potingan ini?
                                                    </b>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- end modal --}}

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
