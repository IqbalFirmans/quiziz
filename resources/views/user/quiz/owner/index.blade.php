@extends('user.layouts.main')
@section('title', 'Kuis Anda')
@section('content')

    <style>
        html {
            font-size: 14px;
        }

        .container {
            font-size: 14px;
            color: #666666;
        }

        .card-custom {
            overflow: hidden;
            min-height: 450px;
            box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
        }

        .card-custom-img {
            height: 200px;
            min-height: 200px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            border-color: inherit;
        }

        /* First border-left-width setting is a fallback */
        .card-custom-img::after {
            position: absolute;
            content: '';
            top: 161px;
            left: 0;
            width: 0;
            height: 0;
            border-style: solid;
            border-top-width: 40px;
            border-right-width: 0;
            border-bottom-width: 0;
            border-left-width: 545px;
            border-left-width: calc(575px - 5vw);
            border-top-color: transparent;
            border-right-color: transparent;
            border-bottom-color: transparent;
            border-left-color: inherit;
        }

        .card-custom-avatar img {
            border-radius: 50%;
            box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
            position: absolute;
            top: 100px;
            left: 1.25rem;
            width: 100px;
            height: 100px;
        }
    </style>

    <div class="container">
        <div class="d-flex justify-content-center">
            <a href="/user/quiz/create">
                <button type="button" class="btn bg-primary border border-white btn-primary">Buat Kuis Baru</button>
            </a>
        </div>
        <div class="row pt-5 m-auto">

            {{-- <div class="col-md-6 col-lg-4 pb-3">

                <!-- Add a style="height: XYZpx" to div.card to limit the card height and display scrollbar instead -->
                <div class="card card-custom bg-white border-white border-0" style="height: 450px">
                    <div class="card-custom-img"
                        style="background-color:#344767;">
                    </div>
                    <div class="card-custom-avatar">
                        <img class="img-fluid border border-white border-2" style="object-fit: cover;"
                            src="{{ asset('quiz.jpg') }}"
                            alt="Avatar" />
                    </div>
                    <div class="card-body" style="overflow-y: auto">
                        <h4 class="card-title">Kuis 1</h4>
                        <p class="card-text">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et, possimus quod distinctio laborum iure voluptate ipsa nostrum autem doloribus quisquam enim odit iusto dicta ea.
                        </p>
                    </div>
                    <div class="card-footer" style="background: inherit; border-color: inherit;">
                        <a href="#" class="btn btn-white bg-warning border border-white text-white">Edit</a>
                        <a href="#" class="btn btn-white bg-danger border border-white text-white">Hapus</a>
                        <a href="#" class="btn btn-white bg-info border border-white text-white">Detail</a>
                    </div>
                </div>

            </div> --}}

            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <div class="position-absolute bg-dark px-3 py-2 bg-opacity-75 rounded-bottom">
                        <a href=""
                        class="text-white text-decoration-none">Quiziz</a>
                    </div>

                    <img src="https://source.unsplash.com/900x500/" class="card-img-top" alt="">

                    <div class="card-body">
                        <h5 class="card-title text-dark">Kuis 1</h5>

                        <small class="text-body-secondary">
                            <p>By. <a href=""
                                    class="text-decoration-none">User 1</a>
                                | 3 days ago
                            </p>
                        </small>

                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis nesciunt quaerat laudantium quae velit ad atque eveniet praesentium ipsum ea.</p>

                        <a href="" class="btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>


        </div>
    </div>


@endsection
